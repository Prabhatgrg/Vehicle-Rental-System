<?php

// function to book post
function book_post($book_start, $book_end, $post_id, $user_id)
{
    global $conn;

    update_bookings();

    $message = [];

    if (!is_booking_available($post_id, $book_start, $book_end)) {
        $message['error'] = "Booking is not available from " . format_date($book_start) . " to " . format_date($book_end);
        return $message;
    }

    $stmt = $conn->prepare("INSERT INTO re_bookings (post_id, user_id, booking_startdate, booking_enddate) VALUES (?,?, ?, ?)");
    $stmt->bind_param('iiss', $post_id, $user_id, $book_start, $book_end);
    if ($stmt->execute()) :
        $message['success'] = 'The post is successfully requested for booking.';
    else :
        $message['error'] = 'There is an error while requesting the booking. Please try again later.';
    endif;

    return $message;
}

// function to check if the booking is available or not
function is_booking_available($post_id, $booking_startdate, $booking_enddate)
{
    global $conn; // Assuming you have the database connection in the global scope

    // Prepare the query with placeholders for the booking dates
    $query = $conn->prepare("SELECT COUNT(*) FROM re_bookings 
                            WHERE post_id = ? 
                            AND booking_status = 'booked' 
                            AND ((booking_startdate <= ? AND booking_enddate >= ?) -- Overlapping range
                                OR (booking_startdate BETWEEN ? AND ?) -- Overlapping startdate
                                OR (booking_enddate BETWEEN ? AND ?)) -- Overlapping enddate");

    // Bind the parameters to the placeholders
    $query->bind_param('issssss', $post_id, $booking_enddate, $booking_startdate, $booking_startdate, $booking_enddate, $booking_startdate, $booking_enddate);

    // Execute the query
    $query->execute();

    // Fetch the result
    $result = $query->get_result();
    $row = $result->fetch_row();

    // Check if any matching post is available within the date range
    $is_available = ($row[0] == 0);

    // Close the query
    $query->close();

    return $is_available;
}

// function to cancel booked post
function cancel_booked_post($post_id, $user_id)
{
    global $conn;

    $message = [];

    update_bookings();

    $status = 'cancelled';

    $stmt = $conn->prepare("SELECT * FROM re_bookings WHERE post_id = ? AND user_id = ?");
    $stmt->bind_param('ii', $post_id, $user_id);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) :
        $data = $result->fetch_array(MYSQLI_ASSOC);
        if ($data['booking_status'] == $status) :
            $message['error'] = 'There is no such a post booked.';
            return $message;
        endif;
    endif;


    $message = update_booking_status($post_id, $user_id, $status);

    return $message;
}

// function to update booking request
function update_booking_request($booking_id, $booking_status)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("UPDATE re_bookings SET booking_status = ? WHERE booking_id = ?");
    $stmt->bind_param('si', $booking_status, $booking_id);

    if ($stmt->execute()) :
        $message['success'] = "You updated the booking status.";
    else :
        $message['error'] = 'There is an error while updating the booking. Please try again.';
    endif;

    return $message;
}

// function to update booking status
function update_booking($post_id, $user_id, $book_start, $book_end, $status)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("UPDATE re_bookings SET booking_status = ?, booking_startdate = ?, booking_enddate = ? WHERE post_id = ? AND user_id = ?");
    $stmt->bind_param('sssii', $status, $book_start, $book_end, $post_id, $user_id);

    if ($stmt->execute()) :
        $message['success'] = "Your booking has been updated.";
    else :
        $message['error'] = 'There is an error while cancelling the booking. Please try again.';
    endif;

    return $message;
}
// function to update booking status
function update_booking_status($post_id, $user_id, $status)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("UPDATE re_bookings SET booking_status = ? WHERE post_id = ? AND user_id = ?");
    $stmt->bind_param('sii', $status, $post_id, $user_id);

    if ($stmt->execute()) :
        $message['success'] = "Your booking has been updated.";
    else :
        $message['error'] = 'There is an error while cancelling the booking. Please try again.';
    endif;

    return $message;
}

// function to check if post booking is expired or not
function is_booking_expired($book_id)
{
    global $conn;

    $status = 'expired';

    $stmt = $conn->prepare("SELECT * FROM re_bookings WHERE booking_id = ? AND booking_status = ?");
    $stmt->bind_param('is', $book_id, $status);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0)
        return true;
    return false;
}

// function that update the booking status based on the end date
function update_bookings()
{
    global $conn;

    $sql = "CALL update_booking_status()";
    $conn->query($sql);
}

// function to check if post is booked or not
function is_pending($post_id, $user_id)
{
    global $conn;

    update_bookings();

    $status = 'pending';

    $stmt = $conn->prepare("SELECT * FROM re_bookings WHERE post_id = ? AND user_id = ? AND booking_status = ?");
    $stmt->bind_param('iis', $post_id, $user_id, $status);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0)
        return true;
    return false;
}

// function to get image by post id
function get_image_by_postid($post_id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM re_posts WHERE post_id = ?");
    $stmt->bind_param('i', $post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) :
        while ($row = $result->fetch_assoc()) {
            $post_image = $row['post_image'];
        }
        return $post_image;
    endif;
}

// function to get notification
function get_notification($user_id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM re_notifications WHERE user_id = ? ORDER BY created_at DESC ");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) :
        while ($row = $result->fetch_assoc()) {

            $post = get_post_by_id($row['post_id']);
            $post_image_array = json_decode($post['post_image']);
            if (count($post_image_array) > 0) {
                $post_thumbnail_url = $post_image_array[0]->path;
                $post_thumbnail_name = $post_image_array[0]->name;
            }
?>
            <div class="card-linear align-items-center justify-content-start">
                <figure class="card-img">
                    <a href="<?php echo get_root_directory_uri() . '/post?id=' . urldecode($row['post_id']); ?>" aria-label="feature image">
                        <?php if (isset($post_thumbnail_url)) : ?>
                            <img src="<?php echo get_root_directory_uri() . '/' . $post_thumbnail_url; ?>" alt="<?php echo $post_thumbnail_name; ?>" loading="lazy" class="notification-image">
                        <?php else : ?>
                            <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image" loading="lazy">
                        <?php endif; ?>
                    </a>
                </figure>
                <div class="card-body">
                    <div class="flex">
                        <h3 class="card-title flex-1 h5 mb-3"><a href="<?php echo get_root_directory_uri() . '/post?id=' . urldecode($row['post_id']); ?>"><?php echo $row['message']; ?></a></h3>
                    </div>
                </div>
            </div>
        <?php
        }
    else : ?>
        <div class="card-linear justify-content-center">
            <div class="card-body">
                <div class="flex">
                    <p class="card-title flex-1 h5 mb-3">No notifications to show</p>
                </div>
            </div>
        </div>
<?php
    endif;
}


// function display_notification(){
//     global $conn;
//     $user_id = get_user_id();
//     get_notification($user_id);
//     if($data->num_rows>0){

//     }
// }
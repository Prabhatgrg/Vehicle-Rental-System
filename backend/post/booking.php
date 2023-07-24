<?php

// function to book post
function book_post($book_start, $book_end, $post_id, $user_id)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("SELECT * FROM re_bookings WHERE post_id = ? AND user_id = ?");
    $stmt->bind_param('ii', $post_id, $user_id);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) :

        $data = $result->fetch_array(MYSQLI_ASSOC);
        if ($data['booking_status'] != 'booked') :

            $message = update_booking($post_id, $user_id, $book_start, $book_end, 'booked');

            return $message;
        endif;

        $message['error'] = 'The post you are booking is aleady booked.';
        return $message;
    endif;

    $stmt = $conn->prepare("INSERT INTO re_bookings (post_id, user_id, booking_startdate, booking_enddate) VALUES (?,?, ?, ?)");
    $stmt->bind_param('iiss', $post_id, $user_id, $book_start, $book_end);
    if ($stmt->execute()) :
        $message['success'] = 'The post is successfully booked.';
    else :
        $message['error'] = 'There is an error while booking the post. Please try again later.';
    endif;

    return $message;
}

// function to cancel booked post
function cancel_booked_post($post_id, $user_id)
{
    global $conn;

    $message = [];

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

// function to check if post is booked or not
function is_booking_expired($book_id)
{
    global $conn;

    $status = 'expired';

    $stmt = $conn->prepare("SELECT * FROM re_bookings WHERE booking_id = ? booking_status = ?");
    $stmt->bind_param('is', $book_id, $status);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0)
        return true;
    return false;
}



// function to check if post is booked or not
function is_booked($post_id, $user_id)
{
    global $conn;

    $status = 'booked';

    $stmt = $conn->prepare("SELECT * FROM re_bookings WHERE post_id = ? AND user_id = ? AND booking_status = ?");
    $stmt->bind_param('iis', $post_id, $user_id, $status);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0)
        return true;
    return false;
}

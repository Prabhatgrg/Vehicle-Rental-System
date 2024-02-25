<?php
if (!isset($_GET['id']) || empty($_GET['id']) || !is_login())
    header('Location: 404');


$post_id = $_GET['id'];
$user_id = get_user_id();

if (!is_my_post($post_id, $user_id)) :
    header("Location: 404");
endif;

if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    if (isset($_POST['booking_submit'])) :
        $booking_status = $_POST['postStatus'];
        $booking_id = $_POST['booking_id'];

        $message = update_booking_request($booking_id, $booking_status);
    endif;
endif;

$bookings = get_bookings_by_post($post_id);

get_header("Booking Detail");
?>

<section class="py-5">
    <div class="container">
        <h1 class="h3 mb-3">Booking Details</h1>

        <div class="mb-2">
            <strong>Note:</strong> <br>
            <span>1. Once you approve or reject that booking request is not editable again.</span><br>
            <span>2. Only approve one for the same date bookings and other bookings on that date should be rejected. </span>
        </div>

        <?php
        if (isset($message['success'])) :
        ?>
            <div class="alert mb-2">
                <p class="bg-success p-1">
                    <?php echo $message['success']; ?>
                </p>
            </div>
        <?php
        endif;
        ?>

        <?php
        if (isset($message['error'])) :
        ?>
            <div class="alert mb-2">
                <p class="bg-error p-1">
                    <?php echo $message['error']; ?>
                </p>
            </div>
        <?php
        endif;
        ?>

        <?php

        if ($bookings) :
            $count  = 1;
        ?>
            <table class="bookings-table">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>User</th>
                        <th>Applied Date</th>
                        <th>Booking Start Date</th>
                        <th>Booking End Date</th>
                        <th>Status</th>
                        <th>Booking Price</th>
                        <th>Edit</th>
                    <tr>
                </thead>
                <tbody>

                    <?php

                    foreach ($bookings as $data) :
                        $book_id = $data['booking_id'];
                        $user_id = $data['user_id'];
                        $booked_date = format_date($data['booking_date']);
                        $start_date = format_date($data['booking_startdate']);
                        $end_date = format_date($data['booking_enddate']);

                        $status = $data['booking_status'];
                        $booking_price = $data['booking_price'];

                        $username = get_username_by_id($user_id);

                        $permalink = 'user?id=' . urlencode($user_id);
                    ?>

                        <tr>
                            <th><?php echo $count; ?></th>
                            <td>
                                <a href="<?php echo  $permalink; ?>" target="_blank">
                                    <?php echo htmlspecialchars($username); ?>
                                </a>
                            </td>
                            <td><?php echo $booked_date; ?></td>
                            <td><?php echo $start_date; ?></td>
                            <td><?php echo $end_date; ?></td>
                            <td style="text-transform: capitalize;">
                                <?php echo $status; ?>
                            </td>
                            <td><?php echo $booking_price; ?></td>
                            <td>
                                <?php if ($status == 'pending') : ?>
                                    <div class="modal-container">
                                        <button class="btn btn-dark btn-modal">Edit</button>
                                        <div class="modal-content px-2">
                                            <div class="flex justify-content-center align-items-center h-100">
                                                <div class="modal-dialog col-md-6 col-lg-5 bg-light">
                                                    <div class="flex justify-content-between align-items-center mb-2">
                                                        <h3>Edit</h3>

                                                        <button class="btn-close">
                                                            <span class="line"></span>
                                                            <span class="screen-reader-text">Close</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" class="grid gap-2 user-review-form">
                                                        <div class="booking-status mb-1">
                                                            <label for="postStatus">Status : </label>
                                                            <input type="hidden" name="_post_id" value="<?php echo $post['post_id']; ?>">
                                                            <select name="postStatus" id="postStatus" class="form-select">
                                                                <option value="booked">Booked</option>
                                                                <option value="rejected">Rejected</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-submit">
                                                            <input type="hidden" name="booking_id" value="<?php echo $book_id; ?>">
                                                            <button type="submit" name="booking_submit" class="btn btn-dark">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                else :
                                    echo "Not editable";
                                endif; ?>
                            </td>
                        </tr>
                    <?php
                        $count++;
                    endforeach; ?>
                </tbody>
            </table>

        <?php
        else :
            echo 'There is no booking history.';
        endif;

        ?>
    </div>
</section>

<?php
get_footer();

<?php
if (!isset($_GET['id']) || empty($_GET['id']) || !is_login())
    header('Location: 404');


$post_id = $_GET['id'];
$user_id = get_user_id();

if (!is_my_post($post_id, $user_id)) :
    header("Location: 404");
endif;

$bookings = get_bookings_by_post($post_id);

get_header("Booking Detail");
?>

<section class="py-5">
    <div class="container">
        <h1 class="h3 mb-3">Booking Details</h1>
        <?php

        if ($bookings) :
            $count  = 1;
        ?>
            <table class="bookings-table">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>User</th>
                        <th>Booked Date</th>
                        <th>Booking Start Date</th>
                        <th>Booking End Date</th>
                        <th>Status</th>
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
                            <td style="text-transform: capitalize;"><?php echo $status; ?></td>
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

<?php
if (!is_login()) :
    header('Location: login');
endif;


get_header("Profile");

define('MAX_STAR', 5);
$user_id = get_user_id();

if (isset($_POST['profile_submit'])) :
    $name = $_POST['profileName'];
    $phone = $_POST['profileNumber'];
    $email = $_POST['profileEmail'];
    $file = $_FILES['profileUpload'];
    update_user_info($user_id, $name, $file, $phone, $email);
endif;

if (isset($_GET['action']) || !empty($_GET['action'])) :
    $post_id = $_GET['post_id'];

    switch ($_GET['action']):
        case 'update_status':
            $status = $_GET['status'];
            echo '<script>const isConfirm = confirm("Are you sure want to mark as rented?");if (!isConfirm) document.location.href = "profile";</script>';
            $message = update_post_status_by_user($post_id, $user_id, $status);
            break;
        case 'delete':
            $message = delete_post_by_id($post_id);
            break;
        default:
            break;
    endswitch;
endif;
?>

<?php if (isset($message)) :
    $key = key($message);
?>
    <div class="alert mb-2">
        <div class="container">
            <p class="bg-<?php echo $key; ?> p-1">
                <?php echo $message[$key]; ?>
            </p>
        </div>
    </div>
<?php endif; ?>


<?php
$user_info = get_user_info_by_id($user_id);
$name = htmlspecialchars($user_info['user_fullname']);
$phone = htmlspecialchars($user_info['user_phone']);
$email = htmlspecialchars($user_info['user_email']);
$avatar = htmlspecialchars($user_info['user_profile']);
?>
<section class="user-profile py-5">
    <div class="container">
        <div class="user-profile-container flex">
            <div class="user-info-container col-3">
                <aside class="user-info-section">
                    <div class="user-image-section">
                        <?php if ($avatar != "") :
                            $img_url = get_image_url($avatar);
                        ?>
                            <img src="<?php echo $img_url; ?>" alt="<?php echo $name; ?>">
                        <?php else : ?>
                            <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="Profile Image">
                        <?php endif; ?>
                    </div>
                    <div class="user-detail-section">
                        <span class="user-name"><?php echo $name; ?></span>
                        <a href="tel:<?php echo $phone; ?>" class="user-contact"><?php echo $phone; ?></a>
                    </div>

                </aside>
                <div class="rating-wrapper">
                    <?php $user_rating = get_user_rating($user_id); ?>
                    <div class="rating">
                        <div class="star-filled" style="width: <?php echo $user_rating * 100; ?>%">
                            <?php for ($i = 0; $i < MAX_STAR; $i++) : ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="black" />
                                </svg>
                            <?php endfor; ?>
                        </div>
                        <div class="star-outline">
                            <?php for ($i = 0; $i < MAX_STAR; $i++) : ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26ZM12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502L9.96214 9.69434L5.12921 10.2674L8.70231 13.5717L7.75383 18.3451L12.0006 15.968Z" fill="black" />
                                </svg>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <span class="rate">
                        <?php echo $user_rating * 5; ?>
                    </span>
                </div>

                <div class="modal-container">
                    <button class="btn btn-dark btn-modal">
                        Update Profile
                    </button>
                    <div class="modal-content px-2">
                        <div class="flex justify-content-center align-items-center h-100">
                            <div class="modal-dialog col-md-6 col-lg-5 bg-light">
                                <div class="flex justify-content-between align-items-center mb-2">
                                    <h3>Update Profile</h3>

                                    <button class="btn-close">
                                        <span class="line"></span>
                                        <span class="screen-reader-text">Close</span>
                                    </button>
                                </div>
                                <form method="post" class="grid gap-2 post-form" enctype="multipart/form-data">
                                    <div class="form-floating">
                                        <input type="text" name="profileName" id="profileName" class="form-control" placeholder="name" value="<?php echo $name; ?>">
                                        <label for="profileName">Full Name</label>
                                    </div>
                                    <div class="form-file-upload">
                                        <span class="form-title mb-2">Upload Image For Post</span>
                                        <label for="profileUpload">
                                            <svg width="60" height="60" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                <defs>
                                                    <style>
                                                        .cls-1 {
                                                            fill: none;
                                                            stroke: #000;
                                                            stroke-linecap: round;
                                                            stroke-linejoin: round;
                                                            stroke-width: 2px;
                                                        }
                                                    </style>
                                                </defs>
                                                <title />
                                                <g id="plus">
                                                    <line class="cls-1" x1="16" x2="16" y1="7" y2="25" />
                                                    <line class="cls-1" x1="7" x2="25" y1="16" y2="16" />
                                                </g>
                                            </svg>
                                        </label>
                                        <input type="file" name="profileUpload" id="profileUpload" class="form-file">
                                    </div>


                                    <div class="form-floating">
                                        <input type="text" name="profileNumber" id="profileNumber" class="form-control" placeholder="phone" value="<?php echo $phone; ?>">
                                        <label for="profileNumber">Phone Number</label>
                                    </div>
                                    <div class="form-floating">
                                        <input name="profileEmail" id="profileEmail" class="form-control" placeholder="email" value="<?php echo $email; ?>" />
                                        <label for="profileEmail">Email</label>
                                    </div>
                                    <div class="form-submit">
                                        <input type="hidden" name="profile_submit" value="submit">
                                        <button type="submit" class="btn btn-dark btn-post-submit" value="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="user-activity-section col-9 ps-2 divider">
                <aside class="user-activities">
                    <div class="tabs-container">
                        <ul class="tab-list">
                            <li><button class="tab-button active" data-target="#user-ad-posts">Ad Posts</button></li>
                            <li><button class="tab-button" data-target="#user-post-bookings">Bookings</button></li>
                            <li><button class="tab-button" data-target="#user-save-list">Save List</button></li>
                            <li><button class="tab-button" data-target="#user-post-reviews">Reviews</button></li>
                        </ul>
                        <div class="tab-content">
                            <div id="user-ad-posts" class="user-ad-posts tab-pane active">
                                <div class="tab-ad-container">
                                    <div class="container">
                                        <?php
                                        $posts = get_post_by_user_id($user_id);


                                        if ($posts) :
                                            echo '<div class="grid gap-1 column-3">';

                                            foreach ($posts as $post) :

                                                $post_id = $post['post_id'];
                                                $permalink = 'post?id=' . urlencode($post_id);

                                                $title = htmlspecialchars($post['post_title']);

                                                $price = htmlspecialchars($post['post_price']);

                                                $post_image_array = json_decode($post['post_image']);
                                                if (count($post_image_array) > 0) {
                                                    $post_thumbnail_url = $post_image_array[0]->path;
                                                    $post_thumbnail_name = $post_image_array[0]->name;
                                                }

                                        ?>
                                                <div class="card overflow-unset">
                                                    <figure class="card-img">
                                                        <a href="<?php echo $permalink; ?>">
                                                            <?php if (isset($post_thumbnail_url)) : ?>
                                                                <img src="<?php echo get_root_directory_uri() . '/' . $post_thumbnail_url; ?>" alt="<?php echo $post_thumbnail_name; ?>" loading="lazy">
                                                            <?php else : ?>
                                                                <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image" loading="lazy">
                                                            <?php endif; ?>
                                                        </a>
                                                    </figure>

                                                    <div class="card-body pt-1">
                                                        <div class="card-detail">
                                                            <h3 class="card-title h5">
                                                                <a href="<?php echo  $permalink; ?>">
                                                                    <?php echo htmlspecialchars($title); ?>
                                                                </a>
                                                            </h3>
                                                            <div class="dropdown-container dot-menu">
                                                                <button class="btn-dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z" fill="black" />
                                                                    </svg>
                                                                </button>
                                                                <div class="dropdown-content">
                                                                    <ul class="dropdown-list-content">
                                                                        <li><a href="booking?id=<?php echo urlencode($post_id); ?>">Booking Details</a></li>
                                                                        <li><a href="?action=<?php echo urlencode('update_status'); ?>&post_id=<?php echo urlencode($post_id); ?>&status=<?php echo urlencode('rented'); ?>">Mark as Rented</a></li>
                                                                        <li><a href="edit?id=<?php echo urlencode($post_id); ?>">Edit Post</a></li>
                                                                        <li><a href="?action=<?php echo urlencode('delete'); ?>&post_id=<?php echo urlencode($post_id); ?>">Delete Post</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <span class="price">Rs. <?php echo htmlspecialchars($price); ?></span>
                                                    </div>
                                                </div>
                                        <?php
                                            endforeach;

                                            echo '</div>';

                                        else :
                                            echo 'There is no ads posted';
                                        endif;

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div id="user-post-bookings" class="user-post-bookings tab-pane">

                                <?php

                                $bookings = get_bookings_by_user($user_id);

                                if ($bookings) :
                                    $count  = 1;
                                ?>
                                    <table class="bookings-table">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Post Name</th>
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
                                                $booked_date = format_date($data['booking_date']);
                                                $start_date = format_date($data['booking_startdate']);
                                                $end_date = format_date($data['booking_enddate']);

                                                $status = $data['booking_status'];

                                                $post = get_post_by_id($data['post_id']);

                                                $permalink = 'post?id=' . urlencode($post['post_id']);

                                                $title = $post['post_title'];

                                            ?>

                                                <tr>
                                                    <th><?php echo $count; ?></th>
                                                    <td>
                                                        <a href="<?php echo  $permalink; ?>" target="_blank">
                                                            <?php echo htmlspecialchars($title); ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $booked_date; ?></td>
                                                    <td><?php echo $start_date; ?></td>
                                                    <td><?php echo $end_date; ?></td>
                                                    <td><?php echo $status; ?></td>
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
                            <div id="user-save-list" class="user-save-list tab-pane">
                                <div class="container">

                                    <?php
                                    $saved_post = get_saved_post($user_id);

                                    if ($saved_post) :
                                        echo '<div class="grid gap-1 column-3">';
                                        foreach ($saved_post as $post) :
                                            $post_id = $post['post_id'];

                                            $post = get_post_by_id($post_id);

                                            $permalink = 'post?id=' . urlencode($post_id);

                                            $title = $post['post_title'];
                                            $price = $post['post_price'];
                                            $post_image_array = json_decode($post['post_image']);
                                            if (count($post_image_array) > 0) {
                                                $post_thumbnail_url = $post_image_array[0]->path;
                                                $post_thumbnail_name = $post_image_array[0]->name;
                                            }
                                    ?>
                                            <div class="card overflow-unset">
                                                <figure class="card-img">
                                                    <a href="<?php echo $permalink; ?>">
                                                        <?php if (isset($post_thumbnail_url)) : ?>
                                                            <img src="<?php echo get_root_directory_uri() . '/' . $post_thumbnail_url; ?>" alt="<?php echo $post_thumbnail_name; ?>" loading="lazy">
                                                        <?php else : ?>
                                                            <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image" loading="lazy">
                                                        <?php endif; ?>
                                                    </a>
                                                </figure>

                                                <div class="card-body pt-1">
                                                    <div class="card-detail">
                                                        <h3 class="card-title h5">
                                                            <a href="<?php echo  $permalink; ?>">
                                                                <?php echo htmlspecialchars($title); ?>
                                                            </a>
                                                        </h3>
                                                        <div class="dropdown-container dot-menu">
                                                            <button class="btn-dropdown">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z" fill="black" />
                                                                </svg>
                                                            </button>
                                                            <div class="dropdown-content">
                                                                <ul class="dropdown-list-content">
                                                                    <li><a href="post?id=<?php echo urlencode($post_id); ?>&bookmark=<?php echo urlencode('false'); ?>">Remove saved</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="price">Rs. <?php echo htmlspecialchars($price); ?></span>
                                                </div>
                                            </div>
                                    <?php
                                        endforeach;
                                        echo '</div>';
                                    else :
                                        echo "There is no saved post";
                                    endif;


                                    ?>
                                </div>
                            </div>
                            <div id="user-post-reviews" class="user-post-reviews tab-pane">
                                <?php display_reviews($user_id); ?>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>

    </div>
</section>

<?php
get_footer()
?>
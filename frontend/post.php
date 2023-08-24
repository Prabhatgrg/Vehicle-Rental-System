<?php

if (!isset($_GET['id']) || empty($_GET['id'])) :
    header('Location: ' . get_root_directory_uri() . '/');
endif;

$post_id = $_GET['id'];

$post_data = get_post_by_id($post_id);

if (isset($post_data['error']))
    header('Location: 404');

$user_id = get_user_id();

update_bookings();

if (!is_admin() && !is_published($post_id)) :
    header('Location: ' . get_root_directory_uri() . '/404');
endif;

if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    if (isset($_POST['comment-submit'])) :
        $comment_content = $_POST['comment-field'];
        $reply_to = $_POST['reply-to'];
        post_comment($post_id, $user_id, $comment_content, $reply_to);
    endif;

    if (isset($_POST['book_submit'])) :
        $book_start = $_POST['bookStartDate'];
        $book_end = $_POST['bookEndDate'];
        $book_post_id = $_POST['book_post_id'];
        $book_user_id = $_POST['book_user_id'];

        $booking_message = book_post($book_start, $book_end, $book_post_id, $book_user_id);
    endif;
endif;

if (isset($_GET['booking'])) :
    switch ($_GET['booking']):
        case 'false':
            $booking_message = cancel_booked_post($post_id, $user_id);
            echo '<script>alert("Your booking is cancelled");document.location.href = "post?id=' . urlencode($post_id) . '"</script>';
            break;
        default:
            break;
    endswitch;

endif;

// to save the post
if (isset($_GET['bookmark'])) :
    switch ($_GET['bookmark']):
        case 'true':
            $booking_message = save_post($post_id, $user_id);
            echo '<script>alert("This post is saved.");document.location.href = "post?id=' . urlencode($post_id) . '"</script>';
            break;
        case 'false':
            $booking_message = remove_saved_post($post_id, $user_id);
            echo '<script>alert("The saved post is removed.");document.location.href = "post?id=' . urlencode($post_id) . '"</script>';
            break;
        default:
            break;
    endswitch;

endif;

if (isset($_GET['action'])) :
    if ($_GET['action'] == 'delete') :
        $comment_id = $_GET['commentid'];
        delete_comment($comment_id);
    endif;
endif;

// updating the views after all the action is done
if (is_published($post_id))
    update_views($post_id);
get_header();



?>

<section class="post-detail py-5">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="col-md-5">
                <figure class="post-gallery">
                    <?php

                    $post_image_array = json_decode($post_data['post_image']);
                    if (count($post_image_array) > 0) :

                        foreach ($post_image_array as $post_image) :
                            echo '<img src="' . get_root_directory_uri() . '/' . $post_image->path . '" alt="' . $post_image->name . '" />';
                        endforeach;

                    else :
                    ?>
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">

                    <?php

                    endif;
                    ?>
                </figure>
            </div>
            <div class="col-md-7 ps-3">
                <?php
                if (isset($booking_message['success'])) :
                ?>
                    <div class="alert mb-2">
                        <p class="bg-success p-1">
                            <?php echo $booking_message['success']; ?>
                        </p>
                    </div>
                <?php
                endif;
                ?>
                <?php
                if (isset($booking_message['error'])) :
                ?>
                    <div class="alert mb-2">
                        <p class="bg-error p-1">
                            <?php echo $booking_message['error']; ?>
                        </p>
                    </div>
                <?php
                endif;
                ?>

                <h1 class="post-title h3"><?php echo htmlspecialchars($post_data['post_title']); ?></h1>

                <div class="post-author">
                    <?php
                    $user_info = get_user_info_by_id($post_data['post_user']);
                    $avatar = $user_info['user_profile'];
                    $user_link =  get_root_directory_uri() . '/user?id=' . urlencode($user_info['user_id']);
                    ?>

                    <div class="user-info">
                        <a href="<?php echo $user_link; ?>" target="_blank">
                            <?php if ($avatar != "") :
                                $img_url = get_image_url($avatar);
                            ?>
                                <img class="user-image" src="<?php echo $img_url; ?>" alt="<?php echo $name; ?>">
                            <?php else : ?>
                                <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="Profile Image">
                            <?php endif; ?>
                        </a>
                        <div class="user-detail">
                            <a href="<?php echo $user_link; ?>" target="_blank">
                                <span class="user-name"><?php echo htmlspecialchars($user_info['user_fullname']); ?></span>
                            </a>
                            <a href="tel:<?php echo htmlspecialchars($user_info['user_phone']); ?>" class="user-contact"><?php echo $user_info['user_phone']; ?></a>
                        </div>
                    </div>
                    <div class="flex gap-2 my-2">
                        <?php if (is_login()) : ?>
                            <?php if (!is_pending($post_id, $user_id)) : ?>
                                <div class="modal-container">
                                    <button class="btn btn-outline btn-modal">
                                        Book Now
                                    </button>
                                    <div class="modal-content px-2">
                                        <div class="flex justify-content-center align-items-center h-100">
                                            <div class="modal-dialog col-md-6 col-lg-5 bg-light">


                                                <div class="flex justify-content-between align-items-center mb-2">
                                                    <h3>Book Now</h3>

                                                    <button class="btn-close">
                                                        <span class="line"></span>
                                                        <span class="screen-reader-text">Close</span>
                                                    </button>
                                                </div>
                                                <form method="post" class="grid gap-2 book-form">

                                                    <div class="form-group grid column-2">
                                                        <div class="form-floating">
                                                            <input type="date" name="bookStartDate" id="bookStartDate" class="form-control" placeholder="Price">
                                                            <label for="bookStartDate">Start Date</label>
                                                        </div>
                                                        <div class="form-floating">
                                                            <input type="date" name="bookEndDate" id="bookEndDate" class="form-control" placeholder="Price">
                                                            <label for="bookEndDate">End Date</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-submit">
                                                        <input type="hidden" name="book_post_id" value="<?php echo $post_id; ?>">
                                                        <input type="hidden" name="book_user_id" value="<?php echo $user_id; ?>">
                                                        <input type="hidden" name="book_submit" value="submit">
                                                        <button type="submit" class="btn btn-dark btn-post-submit" value="submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif (is_pending($post_id, $user_id)) : ?>
                                <a href="post?id=<?php echo urlencode($post_id); ?>&booking=<?php echo urlencode('false'); ?>" class="btn btn-outline">Cancel Booking</a>
                            <?php endif; ?>
                            <?php if (is_saved($post_id, $user_id)) : ?>
                                <a href="post?id=<?php echo urlencode($post_id); ?>&bookmark=<?php echo urlencode('false'); ?>" class="btn btn-outline">Saved</a>
                            <?php else : ?>
                                <a href="post?id=<?php echo urlencode($post_id); ?>&bookmark=<?php echo urlencode('true'); ?>" class="btn btn-outline">Save Post</a>
                            <?php endif; ?>

                            <?php if ($user_id == $post_data['post_user']) : ?>
                                <a href="booking?id=<?php echo urlencode($post_id); ?>" class="btn btn-outline">Booking Details</a>
                            <?php endif; ?>

                        <?php endif; ?>
                    </div>
                </div>

                <div class="tabs-container">
                    <ul class="tab-list">
                        <li><button class="tab-button active" data-target="#post-information">Description</button></li>
                        <li><button class="tab-button" data-target="#post-comments">Comments</button></li>
                        <li><button class="tab-button" data-target="#location-info">Location</button></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="post-information" class="post-information">
                            <div class="post-description mb-2">
                                <?php echo $post_data['post_description']; ?>
                            </div>

                            <div class="other-details">
                                <h2 class="h4 mb-1">Other Details</h2>
                                <ul class="detail-list">
                                    <li>
                                        <span class="detail-title">Colour</span>
                                        <span class="detail-info">
                                            <span style="display:inline-block;width: 20px; height:20px; border-radius: 50%; background-color: <?php echo $post_data['post_color']; ?>"></span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Location</span>
                                        <span class="detail-info"><?php echo htmlspecialchars($post_data['post_location']); ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Delivery</span>
                                        <span class="detail-info"><?php echo $post_data['post_delivery'] ? 'Yes' : 'No'; ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Fuel Type</span>
                                        <span class="detail-info"><?php echo htmlspecialchars($post_data['post_fuel_type']); ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Mileage</span>
                                        <span class="detail-info"><?php echo htmlspecialchars($post_data['post_mileage']); ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Pricing</span>
                                        <span class="detail-info">Rs. <?php echo htmlspecialchars($post_data['post_price']); ?> per day</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="post-comments">
                            <?php require_once 'includes/comments.php'; ?>
                        </div>
                        <div class="tab-pane" id="location-info">
                            <ul class="location-list">
                                <li>
                                    <img class="location-icon" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/location.png" alt="Location Icon">
                                    <span class="location"><?php echo htmlspecialchars($post_data['post_location']); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

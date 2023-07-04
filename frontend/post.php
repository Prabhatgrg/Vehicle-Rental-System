<?php
$post_id = $_GET['id'];

if (!isset($_GET['id']) || empty($_GET['id'])) :
    header('Location: ' . get_root_directory_uri() . '/');
endif;


if (!is_admin() && !is_published($post_id)) :
    header('Location: ' . get_root_directory_uri() . '/404');
endif;

if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    $user_id = get_user_id();
    $comment_content = $_POST['comment-field'];
    $reply_to = $_POST['reply-to'];

    post_comment($post_id, $user_id, $comment_content, $reply_to);
endif;

if (is_published($post_id))
    update_views($post_id);

get_header();

$post_data = get_post_by_id($post_id);

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
                <h1 class="post-title h3"><?php echo $post_data['post_title']; ?></h1>

                <div class="post-author">
                    <div class="user-info">
                        <a href="#">
                            <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                        </a>
                        <div class="user-detail">
                            <a href="#">
                                <span class="user-name">User</span>
                            </a>
                            <a href="tel:9876543210" class="user-contact">9876543210</a>
                        </div>
                    </div>
                    <div class="flex gap-2 my-2">
                        <button class="btn btn-outline">Chat Now</button>
                        <button class="btn btn-outline">Save Post</button>
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
                                        <span class="detail-info"><?php echo $post_data['post_location']; ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Delivery</span>
                                        <span class="detail-info"><?php echo $post_data['post_delivery'] ? 'Yes' : 'No'; ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Fuel Type</span>
                                        <span class="detail-info"><?php echo $post_data['post_fuel_type']; ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Mileage</span>
                                        <span class="detail-info"><?php echo $post_data['post_mileage']; ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Pricing</span>
                                        <span class="detail-info">Rs. <?php echo $post_data['post_price']; ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Rent Start Date</span>
                                        <span class="detail-info"><?php echo $post_data['post_rent_start']; ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Rent End Date</span>
                                        <span class="detail-info"><?php echo $post_data['post_rent_end']; ?></span>
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
                                    <span class="location"><?php echo $post_data['post_location']; ?></span>
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

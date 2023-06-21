<?php
$post_id = $_GET['id'];

if (!isset($_GET['id']) || empty($_GET['id'])) :
    header('Location: ' . get_root_directory_uri() . '/');
endif;

if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    $user_id = get_user_id();
    $comment_content = $_POST['comment-field'];
    $reply_to = $_POST['reply-to'];

    post_comment($post_id, $user_id, $comment_content, $reply_to);
endif;

get_header();

?>

<section class="post-detail py-5">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="col-md-5">
                <figure class="post-gallery">
                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                </figure>
            </div>
            <div class="col-md-7 ps-3">
                <h1 class="post-title h3">Here Goes the Single Page Title</h1>

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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel culpa consequuntur hic quasi nihil facere accusantium enim est, a ipsa in aspernatur nemo minima eius iste ratione aperiam saepe quos.</p>
                                <p>Repudiandae autem excepturi quis quas, sequi ex eum aperiam, alias molestiae eos animi. Sed, quidem sequi? Repellendus eum dolore cum nulla qui. Veniam corporis unde mollitia explicabo enim, quas ducimus.</p>
                                <p>Laudantium, quibusdam vitae ipsum maxime incidunt totam rem, pariatur doloribus beatae quia aspernatur voluptate, veniam placeat. Quae est quos, amet aliquam, ab eaque vero error, voluptatem rem rerum dolorum voluptatum.</p>
                            </div>

                            <div class="other-details">
                                <h2 class="h4 mb-1">Other Details</h2>
                                <ul class="detail-list">
                                    <li>
                                        <span class="detail-title">Colour</span>
                                        <span class="detail-info">Black</span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Location</span>
                                        <span class="detail-info">Thahity, Kathmandu</span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Delivery</span>
                                        <span class="detail-info">Yes</span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Fuel Type</span>
                                        <span class="detail-info">Diesel</span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Mileage</span>
                                        <span class="detail-info">Here is mileage</span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Pricing</span>
                                        <span class="detail-info">Nrs. 5,000 Per Day</span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Rent Start Date</span>
                                        <span class="detail-info">2023/05/03</span>
                                    </li>
                                    <li>
                                        <span class="detail-title">Rent End Date</span>
                                        <span class="detail-info">2023/07/03</span>
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
                                    <span class="location">Thahity, Kathmandu</span>
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

<?php

if (!isset($_GET['id']) || empty($_GET['id'])) :
    header('Location: 404');
endif;

$user_id = $_GET['id'];

$user_name = get_username_by_id($user_id);

$user_data = get_user_info_by_id($user_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    if (isset($_POST['user_review'])) :
        $user_rating = $_POST['userRating'];
        $user_review = $_POST['userReview'];
        $user_id = $_POST['user_id'];
        $reviewer_id = $_POST['reviewer_id'];


        post_user_review($user_id, $reviewer_id, $user_rating, $user_review);
    endif;
endif;

define('MAX_STAR', 5);

get_header($user_name);
?>


<section class="user-profile py-5">
    <div class="container">
        <div class="user-profile-container flex">
            <div class="user-info-container col-4">
                <aside class="user-info-section">
                    <div class="user-image-section">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="Profile Image">
                    </div>
                    <div class="user-detail-section">
                        <span class="user-name"><?php echo $user_name; ?></span>
                        <a href="tel:<?php echo $user_data['user_phone']; ?>" class="user-contact"><?php echo $user_data['user_phone']; ?></a>
                        <span class="user-location">
                            <img class="location-icon" src="./frontend/assets/img/png/location.png" alt="Location Icon">
                            <span class="user-location-details">N/A</span>
                        </span>
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
                <?php if (is_login()) : ?>
                    <div class="review-user">
                        <div class="modal-container">
                            <button class="btn btn-dark btn-modal">Review User</button>
                            <div class="modal-content px-2">
                                <div class="flex justify-content-center align-items-center h-100">
                                    <div class="modal-dialog col-md-6 col-lg-5 bg-light">
                                        <div class="flex justify-content-between align-items-center mb-2">
                                            <h3>Review User</h3>

                                            <button class="btn-close">
                                                <span class="line"></span>
                                                <span class="screen-reader-text">Close</span>
                                            </button>
                                        </div>
                                        <form method="POST" class="grid gap-2 user-review-form">

                                            <div class="star py-1">
                                                <div class="rating">
                                                    <div class="star-filled" style="width: 0%">
                                                        <?php for ($i = 0; $i < MAX_STAR; $i++) : ?>
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="black" />
                                                            </svg>
                                                        <?php endfor; ?>
                                                    </div>
                                                    <div class="star-outline">
                                                        <?php for ($i = 0; $i < MAX_STAR; $i++) : ?>
                                                            <button type="button" value="<?php echo $i + 1; ?>">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26ZM12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502L9.96214 9.69434L5.12921 10.2674L8.70231 13.5717L7.75383 18.3451L12.0006 15.968Z" fill="black" />
                                                                </svg>
                                                            </button>
                                                        <?php endfor; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-floating">
                                                <textarea name="userReview" id="userReview" class="form-control" placeholder="Description"></textarea>
                                                <label for="userReview">Description</label>
                                            </div>

                                            <div class="form-submit">
                                                <input type="hidden" name="userRating" value="0">
                                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                                <input type="hidden" name="reviewer_id" value="<?php echo $_SESSION['user_id']; ?>">
                                                <button type="submit" name="user_review" class="btn btn-dark">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="user-activity-section col-8 ps-2 divider">
                <aside class="user-activities">
                    <div class="tabs-container">
                        <ul class="tab-list">
                            <li><button class="tab-button active" data-target="#user-ad-posts">Ad Posts</button></li>
                            <li><button class="tab-button" data-target="#user-post-reviews">Reviews</button></li>
                        </ul>
                        <div class="tab-content">
                            <div class="user-ad-posts tab-pane active" id="user-ad-posts">
                                <div class="tab-ad-container">
                                    <div class="container">
                                        <?php
                                        $posts = get_post_by_user_id($user_id);


                                        if ($posts) :
                                            echo '<div class="grid gap-1 column-3">';

                                            foreach ($posts as $post) :

                                                $permalink = 'post?id=' . urlencode($post['post_id']);

                                                $title = $post['post_title'];

                                                $price = $post['post_price'];

                                                $post_image_array = json_decode($post['post_image']);
                                                if (count($post_image_array) > 0) {
                                                    $post_thumbnail_url = $post_image_array[0]->path;
                                                    $post_thumbnail_name = $post_image_array[0]->name;
                                                }

                                        ?>
                                                <div class="card">
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
                                                        <h3 class="card-title h5">
                                                            <a href="<?php echo  $permalink; ?>">
                                                                <?php echo $title; ?>
                                                            </a>
                                                        </h3>
                                                        <span class="price">Rs. <?php echo $price; ?></span>
                                                    </div>
                                                </div>
                                        <?php
                                            endforeach;

                                            echo '</div>';

                                        else :
                                            echo 'There is no ads posted by ' . $user_name;
                                        endif;

                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="user-post-reviews tab-pane" id="user-post-reviews">
                                <?php

                                $reviews = get_user_reviews($user_id);

                                if ($reviews) :

                                    foreach ($reviews as $review) :
                                        $reviewer_id = $review['reviewer_id'];
                                        $reviewer_name = get_username_by_id($reviewer_id);
                                        $permalink = 'user?id=' . urlencode($reviewer_id);
                                        $rating = (int) $review['user_rating'];
                                        $rating_percent = ($rating * 100) / 5;
                                        $review_content = $review['user_review'];
                                ?>

                                        <div class="review-card py-1">
                                            <div class="review-items">
                                                <div class="user-meta flex align-items-center gap-1">
                                                    <a href="<?php echo $permalink; ?>" target="_blank">
                                                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="Default Image">
                                                    </a>
                                                    <span>
                                                        <a href="<?php echo $permalink; ?>" target="_blank"><?php echo $reviewer_name; ?></a>
                                                    </span>
                                                </div>
                                                <div class="star py-1">
                                                    <div class="rating">
                                                        <div class="star-filled" style="width: <?php echo $rating_percent; ?>%">
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
                                                </div>
                                                <div class="review-response">
                                                    <span>
                                                        <?php echo $review_content; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                <?php
                                    endforeach;

                                else :
                                    echo "There is no reviews";
                                endif;

                                ?>
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
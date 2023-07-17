<?php
if (!is_login()) :
    header('Location: /login');
endif;

get_header("Profile");

define('MAX_STAR', 5);
$user_id = $_SESSION['user_id'];


?>


<section class="user-profile py-5">
    <div class="container">
        <div class="user-profile-container flex">
            <div class="user-info-container col-3">
                <aside class="user-info-section">
                    <?php
                    $user_info = get_user_info_by_id($user_id);
                    $name = $user_info['user_fullname'];
                    $phone = $user_info['user_phone'];
                    ?>
                    <div class="user-image-section">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="Profile Image">
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

                                                $permalink = 'post?id=' . urlencode($post['post_id']);

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
                                                                    <?php echo $title; ?>
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
                                                                        <li><a href="#">Mark as Rented</a></li>
                                                                        <li><a href="#">Edit Post</a></li>
                                                                        <li><a href="#">Delete Post</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <span class="price">Rs. <?php echo $price; ?></span>
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
                                    echo '<div class="grid gap-1 column-3">';

                                    foreach ($bookings as $data) :

                                        $post = get_post_by_id($data['post_id']);

                                        $permalink = 'post?id=' . urlencode($post['post_id']);

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
                                                            <?php echo $title; ?>
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
                                                                <li><a href="#">Mark as Rented</a></li>
                                                                <li><a href="#">Edit Post</a></li>
                                                                <li><a href="#">Delete Post</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <span class="price">Rs. <?php echo $price; ?></span>
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
                            <div id="user-save-list" class="user-save-list tab-pane">
                                <div class="container">
                                    <div class="grid gap-1 column-3">
                                        <div class="card">
                                            <figure class="card-img">
                                                <a href="#">
                                                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                                                </a>
                                            </figure>

                                            <div class="card-body pt-1">
                                                <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                                                <span class="price">Rs. 5,000/day</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <figure class="card-img">
                                                <a href="#">
                                                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                                                </a>
                                            </figure>

                                            <div class="card-body pt-1">
                                                <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                                                <span class="price">Rs. 5,000/day</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <figure class="card-img">
                                                <a href="#">
                                                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                                                </a>
                                            </figure>

                                            <div class="card-body pt-1">
                                                <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                                                <span class="price">Rs. 5,000/day</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <figure class="card-img">
                                                <a href="#">
                                                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                                                </a>
                                            </figure>

                                            <div class="card-body pt-1">
                                                <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                                                <span class="price">Rs. 5,000/day</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <figure class="card-img">
                                                <a href="#">
                                                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                                                </a>
                                            </figure>

                                            <div class="card-body pt-1">
                                                <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                                                <span class="price">Rs. 5,000/day</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <figure class="card-img">
                                                <a href="#">
                                                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                                                </a>
                                            </figure>

                                            <div class="card-body pt-1">
                                                <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                                                <span class="price">Rs. 5,000/day</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="user-post-reviews" class="user-post-reviews tab-pane">
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
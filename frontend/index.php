<?php
get_header();


?>

<section class="categories py-4">
    <div class="container">
        <div class="categories">
            <h2 class="category-title h3">Our categories</h2>
            <ul class="categories-list">
                <li><a href="#">Trending</a></li>
                <li><a href="#">Latest Upload</a></li>
            </ul>
        </div>
    </div>
</section>

<section class="trending pb-3 mb-3">
    <div class="container">
        <h2 class="h3 mb-2">Trending</h2>


        <?php

        $trading_posts = get_post_by_views();

        if ($trading_posts) :

            echo '<div class="grid gap-1 column-5">';

            foreach ($trading_posts as $post) :
                // echo '<pre>';
                // print_r($post);
                // echo '</pre>';
                $post_image_array = json_decode($post['post_image']);
                if (count($post_image_array) > 0) {
                    $post_thumbnail_url = $post_image_array[0]->path;
                    $post_thumbnail_name = $post_image_array[0]->name;
                }
        ?>

                <div class="card">
                    <figure class="card-img">
                        <a href="<?php echo get_root_directory_uri() . '/post?id=' . urldecode($post['post_id']); ?>" aria-label="feature image">
                            <?php if (isset($post_thumbnail_url)) : ?>
                                <img src="<?php echo get_root_directory_uri() . '/' . $post_thumbnail_url; ?>" alt="<?php echo $post_thumbnail_name; ?>" loading="lazy">
                            <?php else : ?>
                                <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image" loading="lazy">
                            <?php endif; ?>
                        </a>
                    </figure>
                    <ul class="card-features">
                        <li>
                            <a href="#" aria-label="bookmark link">
                                <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="card-body pt-1">
                        <h3 class="card-title h5">
                            <a href="<?php echo get_root_directory_uri() . '/post?id=' . urldecode($post['post_id']); ?>">
                                <?php echo $post['post_title']; ?>
                            </a>
                        </h3>
                        <span class="price">Rs. <?php echo $post['post_price']; ?></span>
                    </div>
                </div>

        <?php
            endforeach;

            echo '</div>';

        else :

            echo 'There is no Trending posts';


        endif;

        ?>

    </div>
</section>

<section class="latest pb-3">
    <div class="container">
        <h2 class="h3 mb-2">Latest Post</h2>
        <div class="grid gap-3 gap-md-2">
            <div class="card-linear">
                <figure class="card-img">
                    <a href="#" aria-label="feature image">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image" loading="lazy">
                    </a>
                </figure>

                <div class="card-body flex-1 p-2">

                    <div class="flex">
                        <h3 class="card-title flex-1 h5 mb-3"><a href="#"> New Car</a></h3>

                        <ul class="card-features">
                            <li>
                                <a href="#" aria-label="bookmark link">
                                    <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-description mb-3">
                        <p>Vehicle Description Here</p>
                    </div>

                    <div class="price-and-availability flex-1 gap-2 mb-3">
                        <span class="price">Rs. 3000/day</span>
                        <span class="available">| Available: </span>
                    </div>
                    <div class="location-and-time flex justify-content-between">
                        <span class="location">Naikap, Kathmandu</span>
                        <span class="time">Just Now</span>
                    </div>
                </div>
            </div>
            <div class="card-linear">
                <figure class="card-img">
                    <a href="#" aria-label="feature image">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image" loading="lazy">
                    </a>
                </figure>

                <div class="card-body flex-1 p-2">

                    <div class="flex">
                        <h3 class="card-title flex-1 h5 mb-3"><a href="#"> New Car</a></h3>

                        <ul class="card-features">
                            <li>
                                <a href="#" aria-label="bookmark link">
                                    <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-description mb-3">
                        <p>Vehicle Description Here</p>
                    </div>

                    <div class="price-and-availability flex-1 gap-2 mb-3">
                        <span class="price">Rs. 3000/day</span>
                        <span class="available">| Available: </span>
                    </div>
                    <div class="location-and-time flex justify-content-between">
                        <span class="location">Naikap, Kathmandu</span>
                        <span class="time">Just Now</span>
                    </div>
                </div>
            </div>
            <div class="card-linear">
                <figure class="card-img">
                    <a href="#" aria-label="feature image">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image" loading="lazy">
                    </a>
                </figure>

                <div class="card-body flex-1 p-2">

                    <div class="flex">
                        <h3 class="card-title flex-1 h5 mb-3"><a href="#"> New Car</a></h3>

                        <ul class="card-features">
                            <li>
                                <a href="#" aria-label="bookmark link">
                                    <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-description mb-3">
                        <p>Vehicle Description Here</p>
                    </div>

                    <div class="price-and-availability flex-1 gap-2 mb-3">
                        <span class="price">Rs. 3000/day</span>
                        <span class="available">| Available: </span>
                    </div>
                    <div class="location-and-time flex justify-content-between">
                        <span class="location">Naikap, Kathmandu</span>
                        <span class="time">Just Now</span>
                    </div>
                </div>
            </div>
            <div class="card-linear">
                <figure class="card-img">
                    <a href="#" aria-label="feature image">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image" loading="lazy">
                    </a>
                </figure>

                <div class="card-body flex-1 p-2">

                    <div class="flex">
                        <h3 class="card-title flex-1 h5 mb-3"><a href="#"> New Car</a></h3>

                        <ul class="card-features">
                            <li>
                                <a href="#" aria-label="bookmark link">
                                    <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-description mb-3">
                        <p>Vehicle Description Here</p>
                    </div>

                    <div class="price-and-availability flex-1 gap-2 mb-3">
                        <span class="price">Rs. 3000/day</span>
                        <span class="available">| Available: </span>
                    </div>
                    <div class="location-and-time flex justify-content-between">
                        <span class="location">Naikap, Kathmandu</span>
                        <span class="time">Just Now</span>
                    </div>
                </div>
            </div>
            <div class="card-linear">
                <figure class="card-img">
                    <a href="#" aria-label="feature image">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image" loading="lazy">
                    </a>
                </figure>

                <div class="card-body flex-1 p-2">

                    <div class="flex">
                        <h3 class="card-title flex-1 h5 mb-3"><a href="#"> New Car</a></h3>

                        <ul class="card-features">
                            <li>
                                <a href="#" aria-label="bookmark link">
                                    <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-description mb-3">
                        <p>Vehicle Description Here</p>
                    </div>

                    <div class="price-and-availability flex-1 gap-2 mb-3">
                        <span class="price">Rs. 3000/day</span>
                        <span class="available">| Available: </span>
                    </div>
                    <div class="location-and-time flex justify-content-between">
                        <span class="location">Naikap, Kathmandu</span>
                        <span class="time">Just Now</span>
                    </div>
                </div>
            </div>
            <div class="card-linear">
                <figure class="card-img">
                    <a href="#" aria-label="feature image">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image" loading="lazy">
                    </a>
                </figure>

                <div class="card-body flex-1 p-2">

                    <div class="flex">
                        <h3 class="card-title flex-1 h5 mb-3"><a href="#"> New Car</a></h3>

                        <ul class="card-features">
                            <li>
                                <a href="#" aria-label="bookmark link">
                                    <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-description mb-3">
                        <p>Vehicle Description Here</p>
                    </div>

                    <div class="price-and-availability flex-1 gap-2 mb-3">
                        <span class="price">Rs. 3000/day</span>
                        <span class="available">| Available: </span>
                    </div>
                    <div class="location-and-time flex justify-content-between">
                        <span class="location">Naikap, Kathmandu</span>
                        <span class="time">Just Now</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

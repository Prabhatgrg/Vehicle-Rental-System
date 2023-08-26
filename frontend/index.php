<?php
get_header();


?>

<section class="categories pt-4">
    <div class="container">
        <div class="categories">
            <h2 class="category-title h3">Our categories</h2>
            <ul class="categories-list">
                <li><a href="#trending">Trending</a></li>
                <li><a href="#latest_upload">Latest Upload</a></li>
            </ul>
        </div>
    </div>
</section>

<section id="trending" class="trending pt-5">
    <div class="container">
        <h2 class="h3 mb-2">Trending</h2>


        <?php

        $trending_posts = get_post_by_views();

        if (is_login())
            $user_id = get_user_id();

        if ($trending_posts) :

            echo '<div class="grid gap-1 column-5">';

            foreach ($trending_posts as $post) :
                $post_id = $post['post_id'];
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
                    <?php if (is_login()) :

                        $is_saved = is_saved($post_id, $user_id) ? 'false' : 'true';

                    ?>
                        <ul class="card-features">
                            <li>
                                <a href="post?id=<?php echo urlencode($post_id); ?>&bookmark=<?php echo urlencode($is_saved); ?>" <?php echo is_saved($post_id, $user_id) ? 'class="saved"' : null; ?> aria-label="bookmark link">
                                    <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>
                    <div class="card-body pt-1">
                        <h3 class="card-title h5">
                            <a href="<?php echo get_root_directory_uri() . '/post?id=' . urldecode($post['post_id']); ?>">
                                <?php echo htmlspecialchars($post['post_title']); ?>
                            </a>
                        </h3>
                        <span class="price">Rs. <?php echo htmlspecialchars($post['post_price']); ?> per day</span>
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
<section id="latest_upload" class="latest pt-5 pb-3">
    <div class="container">
        <h2 class="h3 mb-2">Latest Post</h2>
        <div class="grid gap-3 gap-md-2">
            <?php get_latest_post() ?>
        </div>
    </div>
</section>

<?php
get_footer();

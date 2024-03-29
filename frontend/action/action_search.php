<?php get_header("Search Result");

if ($_SERVER['REQUEST_METHOD'] == 'GET') :
    if (isset($_GET['search'])) :
        $search = $_GET['search'];
        $search = '%' . $search . '%';
        $query = $conn->prepare("SELECT * FROM re_posts WHERE (post_title LIKE ? OR post_location LIKE ?) AND post_status IN ('published', 'rented')");
        $query->bind_param('ss', $search, $search);
        $query->execute();
        $result = $query->get_result();
    endif;
endif;
?>

<section class="result">
    <div class="container">
        <div class="flex justify-content-center align-items-center py-2">
            <div class="col-md-12 col-lg-9">
                <h3 class="text-center divider-bottom my-2">Search Result For: <?php echo htmlspecialchars($_GET['search']); ?></h3>
                <?php
                if ($result->num_rows > 0) : ?>
                    <div class="grid gap-3 gap-md-2">

                        <?php
                        if (is_login())
                            $user_id = get_user_id();
                        while ($row = $result->fetch_assoc()) {
                            $post_id = $row['post_id'];
                            $post_image_array = json_decode($row['post_image']);
                            if (count($post_image_array) > 0) {
                                $post_thumbnail_url = $post_image_array[0]->path;
                                $post_thumbnail_name = $post_image_array[0]->name;
                            }
                        ?>
                            <div class="card-linear">
                                <figure class="card-img">
                                    <a href="<?php echo get_root_directory_uri() . '/post?id=' . urldecode($row['post_id']); ?>" aria-label="feature image">
                                        <?php if (isset($post_thumbnail_url)) : ?>
                                            <img src="<?php echo get_root_directory_uri() . '/' . $post_thumbnail_url; ?>" alt="<?php echo $post_thumbnail_name; ?>" loading="lazy">
                                        <?php else : ?>
                                            <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image" loading="lazy">
                                        <?php endif; ?>
                                    </a>
                                </figure>

                                <div class="card-body flex-1 p-2">

                                    <div class="flex">
                                        <h3 class="card-title flex-1 h5 mb-3"><a href="<?php echo get_root_directory_uri() . '/post?id=' . urldecode($row['post_id']); ?>"><?php echo htmlspecialchars($row['post_title']); ?></a></h3>

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
                                    </div>

                                    <div class="product-description mb-3">
                                        <p><?php echo htmlspecialchars($row['post_description']); ?></p>
                                    </div>

                                    <div class="price-and-availability flex-1 gap-2 mb-3">
                                        <span class="price">Rs <?php echo htmlspecialchars($row['post_price']); ?> /day</span>
                                        <span class="available">| Available: </span>
                                    </div>
                                    <div class="location-and-time flex justify-content-between">
                                        <span class="location"><?php echo htmlspecialchars($row['post_location']); ?></span>
                                        <span class="time"><?php echo htmlspecialchars($row['post_date']); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php else :
                    echo "<div class='text-center'>No Data Found</div>";
                endif;
                    ?>
                        </div>
            </div>
        </div>
</section>

<?php get_footer(); ?>
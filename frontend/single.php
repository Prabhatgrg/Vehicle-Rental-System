<?php session_start();

get_header();
?>

<section class="post-detail py-5">
    <div class="container">
        <div class="flex">
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
                <div class="post-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel culpa consequuntur hic quasi nihil facere accusantium enim est, a ipsa in aspernatur nemo minima eius iste ratione aperiam saepe quos.</p>
                    <p>Repudiandae autem excepturi quis quas, sequi ex eum aperiam, alias molestiae eos animi. Sed, quidem sequi? Repellendus eum dolore cum nulla qui. Veniam corporis unde mollitia explicabo enim, quas ducimus.</p>
                    <p>Laudantium, quibusdam vitae ipsum maxime incidunt totam rem, pariatur doloribus beatae quia aspernatur voluptate, veniam placeat. Quae est quos, amet aliquam, ab eaque vero error, voluptatem rem rerum dolorum voluptatum.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

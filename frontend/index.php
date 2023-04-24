<?php get_header(); ?>

<?php
session_start();
if (isset($_SESSION['success'])) :
    $message = $_SESSION['success'];
    unset($_SESSION['success']);
?>
    <div class="alert">
        <div class="container">
            <p class="bg-success p-2">
                <?php echo $message; ?>
            </p>
        </div>
    </div>
<?php
endif;
?>

<section class="py-4">
    <div class="container">
        <div class="categories">
            <h2 class="category-title h5">Our categories</h2>
            <ul class="categories-list">
                <li><a href="#">Trending</a></li>
                <li><a href="#">Latest Upload</a></li>
            </ul>
        </div>
    </div>
</section>
<section class="trending pb-3">
    <div class="container">
        <h2 class="h5 mb-2">Trending</h2>
        <div class="grid gap-1 column-5">
            <div class="card">
                <figure class="card-img">
                    <a href="#">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                    </a>
                </figure>
                <ul class="card-features">
                    <li>
                        <a href="#">
                            <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                            </svg>
                        </a>
                    </li>
                </ul>
                <div class="card-body pt-1">
                    <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                    <span>Rs. 5,000/day</span>
                </div>
            </div>
            <div class="card">
                <figure class="card-img">
                    <a href="#">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                    </a>
                </figure>
                <ul class="card-features">
                    <li>
                        <a href="#">
                            <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                            </svg>
                        </a>
                    </li>
                </ul>
                <div class="card-body pt-1">
                    <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                    <span>Rs. 5,000/day</span>
                </div>
            </div>
            <div class="card">
                <figure class="card-img">
                    <a href="#">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                    </a>
                </figure>
                <ul class="card-features">
                    <li>
                        <a href="#">
                            <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                            </svg>
                        </a>
                    </li>
                </ul>
                <div class="card-body pt-1">
                    <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                    <span>Rs. 5,000/day</span>
                </div>
            </div>
            <div class="card">
                <figure class="card-img">
                    <a href="#">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                    </a>
                </figure>
                <ul class="card-features">
                    <li>
                        <a href="#">
                            <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                            </svg>
                        </a>
                    </li>
                </ul>
                <div class="card-body pt-1">
                    <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                    <span>Rs. 5,000/day</span>
                </div>
            </div>
            <div class="card">
                <figure class="card-img">
                    <a href="#">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                    </a>
                </figure>
                <ul class="card-features">
                    <li>
                        <a href="#">
                            <svg width="125" height="185" viewBox="0 0 125 185" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 175V5H120V175L61 138L5 175Z" stroke="black" stroke-width="10" />
                            </svg>
                        </a>
                    </li>
                </ul>
                <div class="card-body pt-1">
                    <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                    <span>Rs. 5,000/day</span>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();

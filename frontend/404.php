<?php
get_header();
?>

<section class="py-5">
    <div class="container">
        <div class="flex flex-wrap justify-content-center text-center">
            <div class="col-12">
                <h1>404 Error!</h1>
                <h1 class="h3 mb-2">The page you're looking for is not found</h1>
                <a href="<?php echo get_root_directory_uri(); ?>/" class="btn btn-dark">Go Back Home</a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

<?php
get_header("About");
?>

<section class="about-us py-5">
    <div class="container">
        <div class="flex flex-wrap justify-content-center">
            <div class="col-md-10 col-lg-7">
                <h1 class="text-center mb-4">About Us</h1>
                <div class="grid gap-2 column-2">
                    <div class="card align-items-center team-card">
                        <figure class="card-img mb-2">
                            <img src="<?php echo get_theme_directory_uri(); ?> /assets/img/jpg/prabhat.jpg" alt="prabhat">
                        </figure>
                        <div class="card-body">
                            <h3 class="card-title h5 text-center">
                                Prabhat Gurung
                            </h3>
                        </div>
                    </div>
                    <div class="card align-items-center team-card">
                        <figure class="card-img mb-2">
                            <img src="<?php echo get_theme_directory_uri(); ?> /assets/img/jpg/neer.png" alt="neer">
                        </figure>
                        <div class="card-body">
                            <h3 class="card-title h5 text-center">
                                Neer Bahadur Shrestha
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

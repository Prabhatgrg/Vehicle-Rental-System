<?php
get_header("About");
?>

<section class="py-5">
    <div class="container">
        <h1 class="text-center">About Us</h1>
        <div class="grid gap-1 column-2">
            <div class="card">
                <figure class="card-img col-7 justify-content-center">
                    <a href="#">
                        <img src="<?php echo get_theme_directory_uri();?> /assets/img/jpg/prabhat.jpg" alt="prabhat">
                    </a>
                </figure>
                <div class="card-body">
                    <h3 class="card-title h5 text-center">
                        Prabhat Gurung
                    </h3>
                </div>
            </div>
            <div class="card">
                <figure class="card-img col-7 justify-content-center">
                    <a href="#">
                        <img src="<?php echo get_theme_directory_uri();?> /assets/img/jpg/neer.png" alt="neer">
                    </a>
                </figure>
                <div class="card-body">
                    <h3 class="card-title h5 text-center">
                        Neer Bahadur Shrestha
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
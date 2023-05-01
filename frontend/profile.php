<?php
get_header()
?>

<aside class="user-info">
    <div class="container">
        <div class="flex col-4">
            <div class="user-image">
            </div>
        </div>
    </div>
</aside>

<div class="container">
    <div class="flex col-4">
        <aside class="user-info">
            <div class="user-image col-3">
                <img src="<?php echo get_theme_directory_uri();?>/assets/img/png/default-user.png" alt="Profile Image">
            </div>
        </aside>
    </div>
    <div class="flex col-7">
        <section class="listing">
            Listings
        </section>
    </div>
</div>

<?php
get_footer()
?>
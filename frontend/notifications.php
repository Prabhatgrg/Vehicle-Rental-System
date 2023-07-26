<?php get_header("Notifications"); ?>

<section class="notification">
    <div class="container">
        <div class="flex justify-content-center align-items-center py-5">
            <div class="col-md-5 col-lg-10">
                <h2 class="divider-bottom text-center">Notifications</h2>
                <div class="grid py-4">
                    <?php
                    $user_id = get_user_id();
                    get_notification($user_id);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer() ?>
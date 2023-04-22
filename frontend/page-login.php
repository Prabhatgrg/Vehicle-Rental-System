<?php get_header(); ?>


<section id="login" class="login py-5">
    <div class="container">
        <div class="flex justify-content-center">
            <div class="col-4">
                <form action="#" method="POST" class="grid gap-2 login-form" autocomplete="off">
                    <div class="form-field">
                        <label for="loginUsername">Username</label>
                        <input type="text" name="loginUsername" id="loginUsername" class="form-control">
                    </div>
                    <div class="form-field">
                        <label for="loginPassword">Password</label>
                        <input type="password" name="loginPassword" id="loginPassword" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
                <p class="text-center mt-3">
                    Don't have account yet? then <a href="<?php echo get_root_directory_uri(); ?>/signup">click here</a>.
                </p>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();

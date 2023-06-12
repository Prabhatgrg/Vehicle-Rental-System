<?php get_header(); ?>


<section id="signup" class="signup py-5">
    <div class="container">
        <div class="flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <form action="<?php echo get_root_directory_uri(); ?>/action_register" method="POST" class="grid gap-2 signup-form" autocomplete="off">
                    <div class="form-field">
                        <label for="signupfullName">Full Name</label>
                        <input type="text" name="signupfullName" id="signupfullName" class="form-control">
                    </div>
                    <div class="form-field">
                        <label for="signupPhone">Phone Number</label>
                        <input type="tel" name="signupPhone" id="signupPhone" class="form-control">
                    </div>
                    <div class="form-field">
                        <label for="signupEmail">Email</label>
                        <input type="email" name="signupEmail" id="signupEmail" class="form-control">
                    </div>
                    <div class="form-field">
                        <label for="signupUsername">Username</label>
                        <input type="text" name="signupUsername" id="signupUsername" class="form-control">
                    </div>
                    <div class="form-field">
                        <label for="signupPassword">Password</label>
                        <input type="password" name="signupPassword" id="signupPassword" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
                <p class="text-center mt-3">
                    Already have account? then <a href="<?php echo get_root_directory_uri(); ?>/login">click here</a>.
                </p>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();

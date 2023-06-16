<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $message = user_auth($username, $password);
}

?>

<?php get_header(); ?>



<section id="login" class="login py-5">
    <div class="container">
        <div class="flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <form method="POST" class="grid gap-2 login-form" autocomplete="off">
                    <?php if (isset($message['error'])) : ?>
                        <div class="text-error" role="alert"><?php echo $message['error']; ?></div>
                    <?php endif; ?>
                    <div class="form-field">
                        <label for="loginUsername">Username</label>
                        <input type="text" name="loginUsername" id="loginUsername" class="form-control">
                        <?php if (isset($message['username'])) : ?>
                            <div class="mt-1 text-error" role="alert"><?php echo $message['username']; ?></div>
                        <?php endif; ?>
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

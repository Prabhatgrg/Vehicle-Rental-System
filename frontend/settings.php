<?php
get_header("Settings");
?>

<section class="update-password py-5">
    <div class="container">
        <div class="flex justify-content-center align-items-center">
            <div class="col-md-5 col-lg-4">
                <form action="<?php echo get_root_directory_uri();?>/change_password" method="POST" class="grid gap-1">
                <?php if(isset($_SESSION['success'])) :?>
                    <div class="text-success" role="alert">
                        <?php echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php elseif(isset($_SESSION['error'])) :?>
                    <div class="text-error" role="alert">
                        <?php echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php endif;?>
                    <h2 class="h3">Update Password</h2>
                    <div class="form-floating">
                        <input type="password" name="oldPassword" id="oldPassword" class="form-control" placeholder="Old Password">
                        <label for="oldPassword">Old Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="New Password">
                        <label for="newPassword">New Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password">
                        <label for="confirmPassword">Confirm Password</label>
                    </div>
                    <button class="btn btn-dark">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
<?php
get_header("Settings");
?>

<section class="update-password py-5">
    <div class="container">
        <div class="flex justify-content-center align-items-center">
            <div class="col-md-5 col-lg-4">
                <form action="#" method="POST" class="grid gap-1">
                    <h2 class="h3">Update Password</h2>
                    <div class="form-floating">
                        <input type="text" name="oldPassword" id="oldPassword" class="form-control" placeholder="Old Password">
                        <label for="oldPassword">Old Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="New Password">
                        <label for="newPassword">New Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password">
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
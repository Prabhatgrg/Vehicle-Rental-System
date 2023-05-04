<?php
get_header("Settings");
?>

<section class="update-password">
    <div class="container">
        <div class="flex justify-content-center align-items-center">
            <form action="#" method="POST">
                <div class="form-floating">
                    <span>Update Password</span>
                    <input type="text" name="oldPassword" id="oldPassword" class="form-control" placeholder="Old Password">
                    <label for="oldPassword">Old Password</label>
                    <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="New Password">
                    <label for="newPassword">New Password</label>
                    <input type="text" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password">
                    <label for="confirmPassword">Confirm Password</label>
                    <button>Change Password</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
get_footer();
?>
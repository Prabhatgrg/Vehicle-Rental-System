<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = $_POST['signupfullName'];
    $phone = $_POST['signupPhone'];
    $email = $_POST['signupEmail'];
    $username = $_POST['signupUsername'];
    $password = $_POST['signupPassword'];
    $validate = validate_user($fullname, $email, $username, $password);

    if (count($validate) == 0) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $msg = register_user($fullname, $email, $username, $password, $phone);
    }
}
?>
<?php if (isset($msg['success'])) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $msg['success']; ?>
    </div>
<?php endif; ?>

<?php if (isset($msg['error'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $msg['error']; ?>
    </div>
<?php endif; ?>
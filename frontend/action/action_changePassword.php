<?php

if($_SERVER['REQUEST_METHOD']==='POST'){
    global $conn;

    $user_id = get_user_id();
    $old_password = $_POST['oldPassword'];
    $new_password = $_POST['newPassword'];
    $confirm_password = $_POST['confirmPassword'];

    $change_password = change_password($user_id, $old_password, $new_password, $confirm_password);
}

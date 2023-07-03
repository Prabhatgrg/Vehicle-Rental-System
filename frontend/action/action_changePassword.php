<?php

if($_SERVER['REQUEST_METHOD']==='POST'){
    global $conn;

    $old_password = $_POST['oldPassword'];
    $new_password = $_POST['newPassword'];

    $change_password = change_password($old_password, $new_password);
}

<?php

require_once 'backend/database/db_config.php';
require_once 'users/index.php';

function validate_user(string $name, string $email, string $username, string $password)
{
    global $conn;

    $message = [];
    if (empty($name)) {
        $message['name'] = 'Name is empty';
    }
    if (empty($username)) {
        $message['username'] = 'Username is empty';
    } else {
        $stmt = $conn->prepare('SELECT * FROM re_users WHERE user_login=?');
        $stmt->bind_param('s', $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $users = $result->fetch_array(MYSQLI_ASSOC);

        if (isset($users)) {
            $message['username'] = "Username Already Exists";
        }
    }
    if (empty($email)) {
        $message['email'] = 'Email is empty';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message['email'] = "Invalid Email Format";
    }
    if (empty($password)) {
        $message['password'] = "Password is empty";
    }
    return $message;
}

function register_user($fullname, $email, $username, $password, $phone)
{
    global $conn;
    $message = [];

    $stmt = $conn->prepare("INSERT INTO re_users(user_fullname, user_login, user_password, user_email, user_phone)VALUES(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $fullname, $username, $password, $email, $phone);

    if ($stmt->execute()) {
        $message['success'] = "User Registered Successfully";
        header('Location: ' . get_root_directory_uri() . '/');
    } else {
        $message['error'] = "Error Registering User";
    }
    $stmt->close();
    return $message;
}

function post_comment($post_id, $user_id, $comment_content, $reply_to = null)
{
    global $conn;

    if ($reply_to != null) :

        $stmt = $conn->prepare('INSERT INTO re_comments (comment_post_id, user_id, comment_content, comment_parent) VALUES (?, ?, ?, ?, ?');

    else :

    endif;
}

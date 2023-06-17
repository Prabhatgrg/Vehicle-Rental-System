<?php
function is_login()
{
    if (isset($_SESSION['user_id'])) :
        return true;
    endif;
    return false;
}

function get_user_id()
{
    if (isset($_SESSION['user_id'])) :
        return $_SESSION['user_id'];
    endif;
}
function get_user_name()
{
    if (isset($_SESSION['user_name'])) :
        return $_SESSION['user_name'];
    endif;
}

function user_auth($username, $password)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("SELECT * FROM re_users WHERE user_login = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $message['username'] = "Username does not exist";
    } else {
        $user =  $result->fetch_array(MYSQLI_ASSOC);

        if ($user['user_login'] == $username && password_verify($password, $user['user_password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['user_fullname'];
            header('Location: ' . get_root_directory_uri() . '/');
        } else {
            $message['error'] = "Incorrect username or password";
        }
    }


    return $message;
}

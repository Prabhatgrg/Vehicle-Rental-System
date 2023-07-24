<?php

require_once 'review.php';
require_once 'notification.php';

// Returns boolean value if user is logged in
function is_login()
{
    if (isset($_SESSION['user_id'])) :
        return true;
    else :
        return false;
    endif;
}

// Check if the user is logged in
function check_if_login()
{
    if (!is_login()) {
        header('Location: ' . get_root_directory_uri() . '/login');
    }
}

// Get User ID
function get_user_id()
{
    if (isset($_SESSION['user_id'])) :
        return $_SESSION['user_id'];
    endif;
}

//Get User Name
function get_user_name()
{
    if (isset($_SESSION['user_name'])) :
        return $_SESSION['user_name'];
    endif;
}

// Get user by id
function get_username_by_id($id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT user_fullname FROM re_users WHERE user_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_array(MYSQLI_ASSOC)['user_fullname'];
}

// Authenticate the User
function user_auth($username, $password) //
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

// Validate the User Data
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

// Register the User
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

function is_admin()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM re_user_roles WHERE user_id=?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0)
        return  false;

    $data = $result->fetch_array(MYSQLI_ASSOC);


    if ($data['user_roles'] == 'admin') {
        return true;
    } else {
        return false;
    }
}

function change_password($old_password, $new_password)
{
    global $conn;

    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
    $current_user = get_user_name();

    $stmt = $conn->prepare("SELECT * FROM re_users WHERE user_login = ?");
    $stmt->bind_param("s", $current_user);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $_SESSION['error'] = "No data exists";
    } else {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $password_verify = password_verify($old_password, $row['user_password']);
        if ($password_verify) {
            $stmt = $conn->prepare("UPDATE re_users SET user_password = ? WHERE user_login = ?");
            $stmt->bind_param("ss", $new_password_hash, $current_user);
            $stmt->execute();
            $_SESSION['success'] = "Password Updated";
            header('Location: ' . get_root_directory_uri() . '/settings');
        } else {
            $_SESSION['error'] = "Old password doesn not match";
            header('Location: ' . get_root_directory_uri() . '/settings');
        }
    }
}

// function to logout
function logout()
{
    session_unset();
    session_destroy();
    // Redirect the user to login page
    header('Location: ' . get_root_directory_uri() . '/');
}

// function to get user details by id
function get_user_info_by_id($user_id)
{
    global $conn;

    $data = [];

    $stmt = $conn->prepare('SELECT * FROM re_users WHERE user_id = ?');
    $stmt->bind_param('i', $user_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $data['error'] = 'There is no such user';
            return $data;
        }

        $data = $result->fetch_all(MYSQLI_ASSOC)[0];
    } else {
        $data['error'] = 'Error while fetching user data';
    }

    return $data;
}



function update_user_info($user_id, $name, $user_avatar, $phone, $email)
{
    global $conn;

    $message = [];

    $pname = rand(1000, 10000) . '-' . $user_avatar['name'];
    $tname = $user_avatar['tmp_name'];
    $upload_dir =  'frontend/uploads/';


    move_uploaded_file($tname, $upload_dir . $pname);

    $stmt = $conn->prepare("UPDATE re_users SET user_fullname = ?, user_profile = ?, user_phone = ?, user_email = ? WHERE user_id = ?");
    $stmt->bind_param('ssssi', $name, $pname, $phone, $email, $user_id);

    if ($stmt->execute()) {
        $message['success'] = "User Registered Successfully";
    } else {
        $message['error'] = "Error occured during the registration";
    }


    return $message;
}

function get_image_url(string $img_name)
{
    return get_root_directory_uri() . "/frontend/uploads/" . $img_name;
}

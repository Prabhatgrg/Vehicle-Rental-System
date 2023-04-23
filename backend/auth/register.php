<?php
require_once '../../database/db_config.php';
require_once '../../functions.php';

global $conn;
//Check Authentication
// if(!is_authenticated()){
//     header('/index.php');
//     exit;
// }

//Check if the form is submitted
// if ($_SERVER['REQUEST_METHOD' === 'POST']) {
$signup_full_name = $_POST['signupfullName'];
$email = $_POST['signupEmail'];
$signup_phone = $_POST['signupPhone'];
$username = $_POST['signupUsername'];
$password = $_POST['signupPassword'];

//Sanitize the user input
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = password_hash($password, PASSWORD_DEFAULT); //Hash the password

//Insert the user data into the database
$stmt = $conn->prepare("INSERT INTO `customers`(`fullname`, `username`, `password`, `email`, `phone`) VALUES(?, ?, ?, ?, ?)");
$stmt->bind_param('ssssi', $signup_full_name, $username, $password, $email, $signup_phone);
if ($stmt->execute()) {
    // Set a success message
    $message = 'Account successfully registered!';
    session_start();
    $_SESSION['success'] = $message;
    header('Location: ' . get_root_directory_uri() . '/');
    exit;
} else {
    $message = 'Error occured during the registration';
    header('Location: ' . get_root_directory_uri() . '/signup?error=' . urlencode($message));
    exit;
}

$stmt->close();
$conn->close();
// }

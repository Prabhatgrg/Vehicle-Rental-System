<?php
    require_once './database/db_config.php';
    require_once './backend/function/user_function.php';

    function login(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(authenticate_user($username, $password)){
                //Redirect to dashboard or show success message
                header('Location: dashboard.php');
                exit;
            }else{
                //Show Error message
                echo "Invalid username or password. Please try again.";            }
        }
    }
?>
<?php
    require_once './database/db_config.php';
    require_once './backend/auth/auth.php';

    function logout_user(){
        //Unset user ID from session to indicate logout
        unset($_SESSION['username']);
    }
    logout_user();

    //Redirect to login page or show success message
    header('Location: login.php');
    exit;
?>
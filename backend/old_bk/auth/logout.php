<?php
    require_once './database/db_config.php';
    require_once './backend/function//user_function.php';

    logout_user();

    //Redirect to login page or show success message
    header('Location: login.php');
    exit;
?>
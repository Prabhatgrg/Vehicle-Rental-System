<?php

require_once './backend/database/db_config.php';

if($_SERVER['REQUEST_METHOD'==='POST']){
    $fullname = $_POST['signupfullName'];
    $phone = $_POST['signupPhone'];
    $email = $_POST['signupEmail'];
    $username = $_POST['signupUsername'];
    $password = $_POST['signupPassword'];
}

?>
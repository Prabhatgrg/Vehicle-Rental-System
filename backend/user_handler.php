<?php

    //User Signup Code
    require_once './database/db_config.php';
    
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        //Perform input validation
        if(empty($email) || empty($username) || empty($password)){
            echo "All Fields are required";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Invalid Email Format";
        }else{
            //Sanitize the user input
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = password_hash($password, PASSWORD_DEFAULT); //Hash the password
        }
        //Insert the user data into the database
    }

    //Connect to the database
    require_once '../database/db_config.php';

    //Prepare and execute the SQl query to insert new user into 'customers' table
    $stmt=$conn->prepare("INSERT INTO customers(first_name,last_name,email,phone) VALUES(?, ?, ?, ?)");
?>
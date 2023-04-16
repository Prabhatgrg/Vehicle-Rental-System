<?php
    //Connect to the database
    require_once './database/db_config.php';

    //User Signup Code
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

            //Insert the user data into the database
            $stmt=$conn->prepare("INSERT INTO customers(username, password, email, phone)VALUES(?, ?, ?, ?)");
            $stmt->bind_param("sssi", $username, $password, $email, $phone);
            if($stmt->execute()){
                echo "User Registered Successfully";
            }else{
                echo "Error occured during the registration";
            }

            $stmt->close();
            $conn->close();
        }
    }
?>
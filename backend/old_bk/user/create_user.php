<?php
    //Connect to the database
    require_once './database/db_config.php';
    connect_to_db();

    //Check if the form is submitted
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        //Perform input validation
        if(empty($email) || empty($username) || empty($password)){
            echo "Please Enter all the required fields";
        }
        //Email Validation
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Invalid Email Format";
        }
        else{
            //Sanitize user input
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = password_hash($password, PASSWORD_DEFAULT); //Hash the password

            //Insert the new user data into the database
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
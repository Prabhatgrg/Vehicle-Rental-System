<?php
    require_once './database/db_config.php';

    //Function to authenticate user
    function authenticate_user($username, $password){
        $db = connect_to_db();
        
        //Prepare and execute a database query to check if user exists
        $stmt = $db->prepare("SELECT * FROM customers WHERE username = $username");
        $stmt->execute();
        $user = $stmt->fetch();

        //Check if the user exists and password is correct
        if($user && password_verify($password, $user['password'])){
            //Set User ID in session to indicate authentication
            $_SESSION['username']=$user['id'];

            //Return true to indicate successfull authentication
            return true;
        }else{
            //Return false to indicate unsuccessful authentication
            return false;
        }
    }
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
    function logout_user(){
        //Unset user ID from session to indicate logout
        unset($_SESSION['username']);
    }
?>
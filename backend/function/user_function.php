<?php
    //Function to authenticate user
    function authenticate_user($username, $password){
        $db = connect_to_db();
        
        //Prepare and execute a database query to check if user exists
        $stmt = $db->prepare("SELECT * FROM customers WHERE username = $username");
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;

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
    function logout_user(){
        //Unset user ID from session to indicate logout
        unset($_SESSION['username']);
    }
?>
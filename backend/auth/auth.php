<?php 
    require_once './database/db_config.php';
    require_once './backend/user/create_user.php';
    
    //Function to check if the user is authenticated
    function is_authenticated(){
        //Check if the user is logged in
        if(isset($_SESSION['username'])){
            //User is authenticated
            return true;
        }else{
            //User is not authenticated
            return false;
        }
    }
    //Function to authenticate user
    function authenticate_user($username, $password, $email){
        $db = connect_to_db();
        
        //Prepare and execute a database query to check if user exists
        $stmt = $db->prepare("SELECT * FROM customers WHERE username = $username");
        $stmt->execute();
        $user = $stmt->fetch();
    }
?>
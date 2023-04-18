<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "VRMS";

    function connect_to_db(){
        //Create Connection
        $conn = new mysqli($GLOBALS['servername'],$GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
        return $conn;
        //Check Connection
        if($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
        }
        else{
            echo "Connected Successfully";
        }
    }

?>
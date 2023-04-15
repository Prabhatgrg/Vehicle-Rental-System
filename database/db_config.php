<?php

    $sql = "CREATE DATABASE VRMS";
    if(mysqli_query($conn, $sql)){
        echo "Database created successfully";
    }
    else{
        echo "Error: ".mysqli_error($conn);
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "VRMS";

    //Create Connection
    $conn = new mysqli($servername, $username, $password, $database);

    //Check Connection
    if($conn->connect_error){
        die("Connection Failed: ".$conn->connect_error);
    }
    else{
        echo "Connected Successfully";
    }
?>
<?php
// $servername = 'localhost';
// $username =  'root';
// $password = '';
// $database =  'VRMS';


// function connect_to_db()
// {
//Create Connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// return $conn;
//Check Connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} 
// else {
//     echo "Connection Success";
// }
// }

<?php
$servername = 'localhost';
$username =  'root';
$password = '';
$database =  'VRMS';


// function connect_to_db()
// {
//Create Connection
$conn = new mysqli($servername, $username, $password, $database);
// return $conn;
//Check Connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} 
// else {
//     echo "Connection Success";
// }
// }

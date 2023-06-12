<?php
//Connecting to the database
require_once './database/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $rate = $_POST['rate'];
    $availability = $_POST['availability'];

    if (add_vehicle($make, $model, $year, $rate, $availability)) {
        //Redirect to vehicle list page or show success message
        header('Location: read.php');
        exit;
    } else {
        echo 'There was an error';
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Check Method!!";
}

<?php 
    //Connecting to the database
    require_once './database/db_config.php';
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $make = $_POST['make'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $rate = $_POST['rate'];
        $availability = $_POST['availability'];

        //Insert the data into the database
        $stmt = $conn->prepare('INSERT INTO vehicles(make, model, year, rate, availability)VALUES(?, ?, ?, ?, ?)');
        $stmt->bind_param("ssidi", $make, $model, $year, $rate, $availability);
        if($stmt->execute()){
            echo "Vehicle Registered Succesfully";
        }else{
            echo "Error occured during the registration";
        }
        $stmt->close();
        $conn->close();
    }else{
        echo "Check Method!!";
    }
?>
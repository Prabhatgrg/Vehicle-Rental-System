<?php
    require_once './database/db_config.php';

    //Function to Add vehicles
    function add_vehicle($make, $model, $year, $rate, $availability){
        global $conn;

        //Prepare the SQL statement with placeholders
        $stmt=$conn->prepare('INSERT INTO vehicles($make, $model, $year, $rate, $availability)VALUES(?, ?, ?, ?, ?)');

        //Bind the parameters with the input values
        $stmt->bind_param("ssidi", $make, $model, $year, $rate, $availability);
        
        //Execute the statement
        return $stmt->execute();
    }

    //Function to list vehicles
    function list_vehicle(){
        $stmt = $GLOBALS['conn']->prepare('SELECT * FROM vehicles');
        $stmt->execute();
        $list = $stmt->fetch();
        return $list;
    }
?>
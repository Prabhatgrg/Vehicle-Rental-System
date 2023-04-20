<?php
    require_once './database/db_config.php';
    require_once './backend/auth/auth.php';

    //Check if the user is authenticated, if not redirect to the login page

    //Retrieve list of vehicles
    $list = $conn->prepare('SELECT * FROM vehicles');

    $list->execute();
?>
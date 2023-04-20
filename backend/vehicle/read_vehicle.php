<?php
    require_once './database/db_config.php';
    require_once './backend/auth/auth.php';
    require_once './backend/function/vehicle_function.php';

    //Check if the user is authenticated, if not redirect to the login page

    //Call the function list_vehicle
    list_vehicle();
?>
<?php
    require_once './database/db_config.php';

    function list_vehicle(){
        $stmt = $GLOBALS['conn']->prepare('SELECT * FROM vehicles');
        $stmt->execute();
        $list = $stmt->fetch();
        return $list;
    }
?>
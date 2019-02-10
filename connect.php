<?php
    require_once "user.php";
    $db_server = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if($db_server === FALSE){
        echo "Connection failed: " . $db_server->connect;
    }
?>
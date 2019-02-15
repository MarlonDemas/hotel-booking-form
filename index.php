<?php
    include "login.php";
    require_once "class.user.php";
    $user = new User;

    $user->db->query("CREATE TABLE IF NOT EXISTS users(
                    userID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    fname VARCHAR(128) NOT NULL,
                    uname VARCHAR(128) NOT NULL UNIQUE,
                    pass VARCHAR(128) NOT NULL,
                    date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP)");

?>
<?php
    class Commit {
        public function work(){
            if ($db_server->query($sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . $db_server->error;
            }
        }
    }
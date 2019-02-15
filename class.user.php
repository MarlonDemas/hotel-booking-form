<?php
    require_once "user.php";

    class User {
        public $db;
        public $passErr;

        public function __construct(){
            $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if($this->db->connect_error) {
                echo "Error: Could not connect to database";
                exit;
            }
        }

        // For registration process
        public function reg_user($uname, $pass, $cpass) {
            if($pass != $cpass) {
                $passErr = 'Passwords do not match!';
                return $passErr;
            } else {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "SELECT * FROM users WHERE uname = '$uname'";

                $check = $this->db->query($sql);
                $count_row = $check->num_rows;

                if($count_row == 0) {
                    $sql = "INSERT INTO users(uname, pass) VALUES ('$uname','$pass')";
                    $result = $this->db->query($sql);
                    return $result;
                } else {
                    $userErr = 'Username already exists, please try again';
                    return $userErr;
                }
            }
        }
    }
<?php
    require_once "user.php";

    class User {
        public $db;

        public function __construct(){
            $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if($this->db->connect_error) {
                echo "Error: Could not connect to database";
                exit;
            }
        }

        // For registration process
        public function reg_user($fname, $uname, $pass, $cpass) {
            if($pass != $cpass) {
                $passErr = 'Passwords do not match!';
                return $passErr;
            } else {
                password_hash($pass,PASSWORD_DEFAULT);
                $sql = "SELECT * FROM users WHERE uname = '$uname'";

                $check = $this->db->query($sql);
                $count_row = $check->num_rows;

                if($count_row == 0) {
                    $sql = "INSERT INTO users(fname, uname, pass) VALUES ('$fname','$uname','$pass')";
                    $this->db->query($sql);
                    $success = 'Registration successful';
                    return $success;
                } else {
                    $userErr = 'Username already exists, please try again';
                    return $userErr;
                }
            }
        }

        // For login process
        public function check_login($uname, $pass) {
            $sql = "SELECT userID, pass from users WHERE uname='$uname'";

            $result = $this->db->query($sql);
            $user_data = mysqli_fetch_array($result);
            $count_row = $result->num_rows;

            if ($count_row == 1) {
                if(password_verify($pass,$user_data['pass'])){
                    $_SESSION['login'] = true;
                    $_SESSION['userID'] = $user_data['userID'];
                    return true;
                } else {
                    return "Password incorrect, please try again";
                }
            } else {
                return "Invalid username, please try again";
            }
            
        }
    }
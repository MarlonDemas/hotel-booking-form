<?php
    require_once "user.php";

    class User {
        public $db;

        public function __construct(){
            $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if($this->db->connect_error) {
                // echo "Error: Could not connect to database";
                exit;
            }
        }

        // For registration process
        public function reg_user($fname, $uname, $pass, $cpass) {
            if($pass != $cpass) {
                $passErr = 'Passwords do not match!';
                return $passErr;
            } else {
                $pass = password_hash($pass,PASSWORD_DEFAULT);
                $sql = "SELECT * FROM users WHERE uname = '$uname'";

                $check = $this->db->query($sql);
                $count_row = $check->num_rows;

                if($count_row == 0) {
                    $sql = "INSERT INTO users(fname, uname, pass) VALUES ('$fname','$uname','$pass')";
                    $this->db->query($sql);
                    $success = 'Registration successful';
                    return $success;
                } else {
                    $userErr = 'Username already exists';
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
                    return "Password incorrect";
                }
            } else {
                return "Invalid username";
            }            
        }

        // For getting the fullname
        public function get_fullname($userID) {
            $sql = "SELECT fname FROM users WHERE userID = '$userID'";
            $result = $this->db->query($sql);
            $user_data = mysqli_fetch_array($result);
            echo $user_data['fname'] . ". ";
        }

        // For getting the username
        public function get_username($userID) {
            $sql = "SELECT uname FROM users WHERE userID = '$userID'";
            $result = $this->db->query($sql);
            $user_data = mysqli_fetch_array($result);
            echo $user_data['uname'];
        }

        // Starting the session
        public function get_session() {
            return $_SESSION['login'];
        }

        public function user_logout() {
            $_SESSION['login'] = FALSE;
            session_destroy();
        }

        // Booking a hotel
        public function make_booking() {
            $this->hotel = $_POST['hotelname'];
            $this->date_in = $_POST['date_in'];
            $this->date_out = $_POST['date_out'];
            $this->num_guests = $_POST['num_guests'];
            $this->num_rooms = $_POST['num_rooms'];

            $sql = "SELECT * FROM bookings WHERE (hotel_name = '$this->hotel' and
                                                        date_in = '$this->date_in' and
                                                        date_out = '$this->date_out' and
                                                        num_guests = '$this->num_guests' and
                                                        num_rooms = '$this->num_rooms')";

            $check = $this->db->query($sql);
            $count_row = $check->num_rows;

            if($count_row == 0) {
                $sql = "INSERT INTO bookings(hotel_name, date_in, date_out, num_guests, num_rooms) VALUES ('$this->hotel', '$this->date_in', '$this->date_out', '$this->num_guests', '$this->num_rooms')";
                $this->db->query($sql);
                return true;
            } else {
                return false;
            }
        }

        public function get_hotel() {
            echo $this->hotel;
        }

        public function get_num_days() {
            $datetime1 = new DateTime($this->date_in);
            $datetime2 = new DateTime($this->date_out);
            $this->interval = $datetime1->diff($datetime2);
            
            echo $this->interval->format('%a');
        }

        public function get_rate() {
            if($this->hotel == "Voyage Hotel"){
                echo "R250 per person";
            } else if($this->hotel == "Summer Dune Hotel") {
                echo "R290 per person";
            } else {
                echo "R330 per person";
            }
        }

        public function get_total() {
            if($this->hotel == "Voyage Hotel"){
               $total = 250 * $this->num_guests * $this->num_rooms * $this->interval->format('%a');
            } else if($this->hotel == "Summer Dune Hotel") {
                $total = 290 * $this->num_guests * $this->num_rooms * $this->interval->format('%a');
            } else {
                $total = 330 * $this->num_guests * $this->num_rooms * $this->interval->format('%a');
            }

            echo 'R' . $total;
        }

        public function get_num_guests() {
            echo $this->num_guests;
        }

        public function get_num_rooms() {
            echo $this->num_rooms;
        }
    }
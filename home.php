<?php
    session_start();
    require_once "class.user.php";

    $user = new User;
    $user->db->query("CREATE TABLE IF NOT EXISTS bookings (
                    hotelID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    hotel_name VARCHAR(128) NOT NULL,
                    date_in DATETIME NOT NULL,
                    date_out DATETIME NOT NULL,
                    num_guests INT(2) NOT NULL,
                    num_rooms INT(2) NOT NULL)");
                    
    $userID = $_SESSION['userID'];

    if (!$user->get_session()) {
        header("location:login.php");
    }

    if(isset($_GET['q'])) {
        $user->user_logout();
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <style>
        .hero {
            background-image: url("img/pexels-photo-189296.jpeg");
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            filter: blur(3px);
        }

        body .navbar {
            background: rgba(255, 255, 255, 0.6);
            padding-bottom: 10px;
        }

        .section {
            position: absolute;
            top: 5%;
            left: 15%;
        }

        .first, .second, .third {
            display: none;
        }

        .image img {
            max-height: 290px;
        }

        .mystyle {
            display: none;
        }
    </style>
</head>

<body>
    <section class="hero is-fullheight has-navbar-fixed-top">
    </section>
    <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <h3 class="title is-5 has-text-weight-bold has-text-black">BookINN</h3>
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <span class="has-text-black">
                        Logged in as
                        <?php 
                        $user->get_username($userID);
                    ?>
                        | <a href="home.php?q=logout">Log Out</a>
                    </span>
                </div>
            </div>
    </nav>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-one-third">
                    <div class="box" id="myDIV">
                        <h2 class="title is-4 has-text-centered">Make Your Booking</h2>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form">
                            <div class="field">
                                <label class="label">Select your hotel</label>
                                <p class="control has-icons-left">
                                    <span class="select">
                                        <select name="hotelname">
                                            <option value="">--please select your hotel--</option>
                                            <option value="Voyage Hotel">Voyage Hotel</option>
                                            <option value="Summer Dune Hotel">Summer Dune Hotel</option>
                                            <option value="Sapphire Hotel">Sapphire Hotel</option>
                                        </select>
                                    </span>
                                    <span class="icon is-left">
                                        <i class="fas fa-hotel"></i>
                                    </span>
                                </p>
                            </div>

                            <div class="field">
                                <label class="label">Check-in Date</label>
                                <p class="control has-icons-left">
                                    <input class="input" name="date_in" type="date" value="<?php echo date('Y-m-d');?>">
                                    <span class="icon is-left">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </p>
                            </div>

                            <div class="field">
                                <label class="label">Check-out Date</label>
                                <p class="control has-icons-left">
                                    <input class="input" name="date_out" type="date" value="<?php echo date('Y-m-d'); ?>">
                                    <span class="icon is-left">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </p>
                            </div>

                            <div class="field">
                                <label class="label">No. of Guests</label>
                                <p class="control">
                                    <input class="input" name="num_guests" type="number" min="1" max="15" value="1">
                                </p>
                            </div>
                            
                            <div class="field">
                                <label class="label">No. of Rooms</label>
                                <p class="control">
                                    <input class="input" name="num_rooms" type="number" min="1" max="5" value="1">
                                </p>
                            </div>

                            <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-link" name="submit">Submit Booking</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
                <div class="column is-one-third">
                    <div class="card first">
                        <div class="card-image">
                            <figure class="image">
                                <img src="img\pexels-photo-262047.jpeg" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">Voyage Hotel</p>
                                </div>
                                <div class="media-right">
                                    <p>R250 per person</p>
                                </div>
                            </div>
                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Animi quia nesciunt tempora vero neque pariatur culpa error cum quo eos, impedit
                                magnam! Aspernatur consectetur ipsa quibusdam sint excepturi eligendi pariatur.
                            </div>
                        </div>
                    </div>

                    <div class="card second">
                        <div class="card-image">
                            <figure class="image">
                                <img src="img\pexels-photo-261102.jpeg" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">Summer Dune</p>
                                </div>
                                <div class="media-right">
                                    <p>R290 per person</p>
                                </div>
                            </div>
                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Animi quia nesciunt tempora vero neque pariatur culpa error cum quo eos, impedit
                                magnam! Aspernatur consectetur ipsa quibusdam sint excepturi eligendi pariatur.
                            </div>
                        </div>
                    </div>
                    
                    <div class="card third">
                        <div class="card-image">
                            <figure class="image">
                                <img src="img\governor-s-mansion-montgomery-alabama-grand-staircase-161758.jpeg" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">Sapphire Hotel</p>
                                </div>
                                <div class="media-right">
                                    <p>R330 per person</p>
                                </div>
                            </div>

                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Animi quia nesciunt tempora vero neque pariatur culpa error cum quo eos, impedit
                                magnam! Aspernatur consectetur ipsa quibusdam sint excepturi eligendi pariatur.
                            </div>
                        </div>
                    </div>
                    <?php if(isset($_POST['submit'])){ 
                        if ($user->make_booking()) { ?>
                            <p class="box book">
                                <strong>
                                    Hello <?php $user->get_fullname($userID); ?><br>
                                    You are booking the <?php $user->get_hotel(); ?>.
                                </strong><br>
                                Check-in date: <strong><?php $user->get_check_in_date(); ?></strong><br>
                                Check-out date: <strong><?php $user->get_check_out_date(); ?></strong><br>
                                Number of nights: <strong><?php $user->get_num_days(); ?></strong><br>
                                Number of guests: <strong><?php $user->get_num_guests(); ?></strong><br>
                                Number of rooms: <strong><?php $user->get_num_rooms(); ?></strong><br>
                                Daily Rate: <strong><?php $user->get_rate(); ?></strong><br>
                                Total: <strong><?php $user->get_total(); ?></strong>
                            </p>
                        <?php } else { ?>
                        <p class="box book">
                            <strong>
                                Hello <?php $user->get_fullname($userID); ?><br>
                                Our records show that you have already made this booking. 
                            </strong>
                        </p>
                        <?php }
                        } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- jQuery JS 3.1.0 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        // var selectedItem = sessionStorage.getItem("SelectedItem");
        // $('#dropdown').val(selectedItem);
        $('select').change(function () {
            var sel = $('select option:selected');
            if (sel.val() == "Voyage Hotel") {
                $('.first').css('display', "block");
                $('.second').css('display', "none");
                $('.third').css('display', "none");
                $('.book').css('display', "none");
            } else if (sel.val() == "Summer Dune Hotel") {
                $('.first').css('display', "none");
                $('.second').css('display', "block");
                $('.third').css('display', "none");
                $('.book').css('display', "none");
            } else if (sel.val() == "Sapphire Hotel") {
                $('.first').css('display', "none");
                $('.second').css('display', "none");
                $('.third').css('display', "block");
                $('.book').css('display', "none");
            } else if (sel.val() == "") {
                $('.first').css('display', "none");
                $('.second').css('display', "none");
                $('.third').css('display', "none");
                $('.book').css('display', "none");
            }
        });
    </script>
</body>

</html>
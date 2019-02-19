<?php
    session_start();
    require_once "classes/class.user.php";

    // Instantiating my user class
    $user = new User;

    // Creating the bookings table if it does not already exist
    $user->db->query("CREATE TABLE IF NOT EXISTS bookings (
                    bookingID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    hotel_name VARCHAR(128) NOT NULL,
                    date_in DATETIME NOT NULL,
                    date_out DATETIME NOT NULL,
                    num_guests INT(2) NOT NULL,
                    num_rooms INT(2) NOT NULL,
                    hotel_booked INT(1) NOT NULL DEFAULT 0)");
                    
    $userID = $_SESSION['userID'];

    if (!$user->get_session()) {
        header("location:login.php");
    }

    if(isset($_GET['q'])) {
        $user->user_logout();
        header("location:login.php");
    }

    if(isset($_POST['confirm'])) {
        $bookedID = $_SESSION['bookedID'];
        $user->confirm_booking($bookedID);
        header("location:confirmed.php");
    } else if(isset($_POST['canceled'])) {
        header("location:confirmed.php");
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
        }

        body .hero .navbar {
            background: rgba(255, 255, 255, 0.6);
            padding-bottom: 10px;
        }

        .section {
            margin: auto;
        }
        
        .box {
            width: 70%;
            margin: auto;
        }

        .first, .second, .third {
            display: none;
        }

        .image img {
            max-height: 290px;
        }

        .card {
            width: 70%;
            margin: auto;
        }

        @media screen and (max-width: 1200px) {
            .box {
                width: 85%;
            }

            .card {
                width: 85%;
            }
        }

        @media screen and (max-width: 960px) {
            .box {
                width: 100%;
            }

            .card {
                width: 100%;
            }
        }

        @media screen and (max-width: 770px) {
            .box {
                width: 70%;
            }

            .card {
                width: 70%;
            }
        }

        @media screen and (max-width: 550px) {
            .box {
                width: 90%;
            }

            .card {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <section class="hero is-fullheight">
    <nav class="navbar" role="navigation" aria-label="main navigation">
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
                <div class="column is-half">
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
                <div class="column is-half">
                    <div class="card bookinn" id="bookinn">
                        <div class="card-image">
                            <figure class="image">
                                <img src="img\pexels-photo-573552.jpeg" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">Hotel BookINN</p>
                                </div>
                            </div>
                            <div class="content">
                                Welcome to Hotel BookINN, a site where you can make a booking at one of three hotels. Once the booking is made a confirm message will pop up with the total price based on your selections and you will be able to cancel the booking if not satisfied. This site also helps avoid making double bookings and will notify you if that is the case.
                            </div>
                        </div>
                    </div>

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
                                Voyage Hotel features a 24-hour front desk, computer station, multilingual staff, tour/ticket assistance, and concierge services. Dry cleaning/laundry services and beach and casino shuttle services are available for an additional cost. Public areas are equipped with free Wi-Fi, and onsite parking is provided for a surcharge.
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
                                This hotel is situated in a gorgeous spot right on the beach and looking out over majestic Table Mountain, The Summer Dune Hotel is a large resort-like complex offering a wide array of accommodation. It has a sophisticated pool terrace and numerous conference and meeting venues.
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
                            Sapphire Hotel is set between the V&A Waterfront and the Table Mountain, which is dubbed as a world heritage site in Cape Town.  This luxurious five-star hotel boasts modern conference facilities. Most rooms have both dining and living areas the and the fitness room is very well-equipped. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        if(isset($_POST['submit'])){
    ?>
            <script>
                document.getElementById("bookinn").style.display = "none";
            </script> 
        <?php
            if ($user->make_booking()) { ?>
                <?php $bookedID = $user->get_booking_id();
                $_SESSION['bookedID'] = $bookedID; ?>
                <script>
                    document.getElementById("myDIV").style.display = "none";
                </script>
                <div class="box book">
                    <strong>
                        Hello <?php $user->get_fullname($userID); ?>
                        You are booking the <?php $user->get_hotel(); ?><br>
                        from <?php $user->get_check_in_date(); ?> until 
                        <?php $user->get_check_out_date(); ?>.
                    </strong><br>
                    Your Unique ID: <strong><?php $user->display_booking_id(); ?></strong><br>
                    Number of nights: <strong><?php $user->get_num_days(); ?></strong><br>
                    Number of guests: <strong><?php $user->get_num_guests(); ?></strong><br>
                    Number of rooms: <strong><?php $user->get_num_rooms(); ?></strong><br>
                    Daily Rate: <strong><?php $user->get_rate(); ?></strong><br>
                    Total: <strong><?php $user->get_total(); ?></strong><br><br>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form">
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" name="confirm">Confirm Booking</button>
                            </div>
                            <div class="control">
                                <button class="button" name="canceled">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php 
            } else { ?>
            <script>
                document.getElementById("myDIV").style.display = "none";
            </script>
            <div class="box book double">
                <strong>
                    Hello <?php $user->get_fullname($userID); ?><br>
                    Our records show that you have already made this booking. 
                </strong><br><br>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form">
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary">Home</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php 
            }
        } 
    ?>
    </section>
    </section>
    <!-- jQuery JS 3.1.0 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $('select').change(function () {
            var sel = $('select option:selected');
            if (sel.val() == "Voyage Hotel") {
                $('.first').css('display', "block");
                $('.second').css('display', "none");
                $('.third').css('display', "none");
                $('.book').css('display', "none");
                $('.bookinn').css('display', "none");
            } else if (sel.val() == "Summer Dune Hotel") {
                $('.first').css('display', "none");
                $('.second').css('display', "block");
                $('.third').css('display', "none");
                $('.book').css('display', "none");
                $('.bookinn').css('display', "none");
            } else if (sel.val() == "Sapphire Hotel") {
                $('.first').css('display', "none");
                $('.second').css('display', "none");
                $('.third').css('display', "block");
                $('.book').css('display', "none");
                $('.bookinn').css('display', "none");
            } else if (sel.val() == "") {
                $('.first').css('display', "none");
                $('.second').css('display', "none");
                $('.third').css('display', "none");
                $('.book').css('display', "none");
                $('.bookinn').css('display', "none");
            }
        }); 
    </script>
</body>

</html>
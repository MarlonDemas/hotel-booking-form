<?php
    session_start();
    require_once "classes/class.user.php";

    // Instantiating my user class
    $user = new User;

    $userID = $_SESSION['userID'];
    $bookedID = $_SESSION['bookedID'];

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

        body .navbar {
            background: rgba(255, 255, 255, 0.6);
            padding-bottom: 10px;
        }

        .box {
            margin: auto;
        }
    </style>
</head>

<body>
    <section class="hero is-fullheight has-navbar-fixed-top">
        <div class="box">
            <?php 
                if($user->check_booking_confirmed($bookedID)) { 
                    echo "<strong>Congragulations!</strong> Your booking has been confirmed.";
                } else {
                    echo "Booking was canceled!";
                }
            ?><br><br>
            <a href="home.php" class="button is-link">Home</a>
        </div>
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
                        Logged in as <?php $user->get_username($userID); ?> | <a href="home.php?q=logout">Log Out</a>
                    </span>
                </div>
            </div>
    </nav>
</body>

</html>
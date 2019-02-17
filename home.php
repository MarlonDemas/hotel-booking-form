<?php
    session_start();
    require_once "class.user.php";

    $user = new User;
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
            background-repeat: no-repeat;
            filter: blur(3px);
            }

        body .navbar {
            background: rgba(255, 255, 255, 0.6);
            padding-bottom: 10px;
        }

        .section {
            position: absolute;
            top: 20%;
            left: 15%;
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
                    <div class="box">
                        <h2 class="title is-4 has-text-centered">Make Your Booking</h2>
                        <div class="field">
                            <label class="label">Select your hotel</label>
                            <p class="control has-icons-left">
                                <span class="select">
                                    <select name="hotelname">
                                        <option>--please select your hotel--</option>
                                        <option value="Hotel 1">Hotel 1</option>
                                        <option value="Hotel 2">Hotel 2</option>
                                        <option value="Hotel 3">Hotel 3</option>
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
                                <input class="input" name="date1" type="date" value="<?php echo date('Y-m-d');?>">
                                <span class="icon is-left">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </p>
                        </div>

                        <div class="field">
                            <label class="label">Check-out Date</label>
                            <p class="control has-icons-left">
                                <input class="input" name="date2" type="date" value="<?php echo date('Y-m-d'); ?>">
                                <span class="icon is-left">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </p>
                        </div>

                        <div class="field">
                            <label class="label">No. of Guests</label>
                            <p class="control has-icons-left">
                                <input class="input" name="date2" type="number">
                            </p>
                        </div>

                        <div class="field is-grouped is-centered">
                            <div class="control">
                                <button class="button is-link" name="submit">Submit Booking</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
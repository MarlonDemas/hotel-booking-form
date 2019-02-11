<?php
    require_once "connect.php";

    $sql = " CREATE TABLE IF NOT EXISTS hotel (
             id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
             GuestName VARCHAR(128),
             HotelName VARCHAR(128),
             NumDays INT";

    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hotel Booking Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <style>
            .section {
                background-image: url("img/pexels-photo-573552.jpeg");
                background-size: cover;
                background-repeat: no-repeat;
                height: 100vh;
            }
            hr {
                background-color: transparent;
            }
            .container .columns .column .box {
                background-color: rgba(0,0,0,0.5);
            }
            ::placeholder {
                color: red !important;
            }
        </style>
    </head>
    <body>
        <section class="section">
            <h2 class="title is-2 has-text-white" style="margin-left: 5%">Hotel Reservations</h2>
            <hr>
            <div class="container">
                <div class="columns">
                    <div class="column is-half">
                        <div class="box">
                            <form action="index.php" method="post" class="form">
                                <div class="field">
                                    <label class="label has-text-white">Name</label>
                                    <p class="control">
                                        <input class="input" type="text" placeholder="Please enter your name">
                                    </p>
                                </div>
                                
                                <div class="field">
                                    <label class="label has-text-white">Surname</label>
                                    <p class="control">
                                        <input class="input" type="text" placeholder="Please enter your surname">
                                    </p>
                                </div>
                                
                                <div class="field">
                                <label class="label has-text-white">Select your hotel</label>
                                <p class="control">
                                    <span class="select">
                                    <select>
                                        <option>Hotel 1</option>
                                        <option>Hotel 2</option>
                                        <option>Hotel 3</option>
                                    </select>
                                    </span>
                                </p>
                                </div>

                                <div class="field" style="padding-bottom: 100px">
                                    <label class="label has-text-white">Number of days</label>
                                    <p class="control">
                                        <input class="input" type placeholder="e.g 3">
                                    </p>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
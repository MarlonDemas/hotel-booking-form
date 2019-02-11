<?php
    require_once "connect.php";

    $name = $surname = $hotel = $days = "";

    $sql = "CREATE TABLE IF NOT EXISTS hotel (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(128) NOT NULL,
            Surname VARCHAR(128) NOT NULL,
            HotelName VARCHAR(128) NOT NULL,
            arriveDate VARCHAR(128) NOT NULL,
            departDate VARCHAR(128) NOT NULL)";

    if ($db_server->query($sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . $db_server->error;
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $hotel = $_POST['hotelname'];
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];

        $sql = "INSERT INTO hotel(Name, Surname, HotelName, NumDays) VALUES ('$name','$surname','$hotel','$date1','$date2')";

        if ($db_server->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $db_server->error;
        }

    }

   
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
                color: black !important;
            }
        </style>
</head>

<body>
    <section class="section">
        <h2 class="title is-2 has-text-white" style="margin-left: 5%">Hotel BookINN</h2>
        <div class="container">
            <div class="columns">
                <div class="column is-half">
                    <div class="box">
                        <form action="index.php" method="post" class="form">
                            <div class="field">
                                <label class="label has-text-white">Name</label>
                                <p class="control">
                                    <input class="input" type="text" name="name" placeholder="Please enter your name">
                                </p>
                            </div>

                            <div class="field">
                                <label class="label has-text-white">Surname</label>
                                <p class="control">
                                    <input class="input" type="text" name="surname" placeholder="Please enter your surname">
                                </p>
                            </div>

                            <div class="field">
                                <label class="label has-text-white">Select your hotel</label>
                                <p class="control">
                                    <span class="select">
                                        <select name="hotelname">
                                            <option value="Hotel 1">Hotel 1</option>
                                            <option value="Hotel 2">Hotel 2</option>
                                            <option value="Hotel 3">Hotel 3</option>
                                        </select>
                                    </span>
                                </p>
                            </div>

                            <div class="field">
                                <label class="label has-text-white">Check-in Date</label>
                                <p class="control">
                                    <input class="input" name="date1" type="date" placeholder="e.g 3">
                                </p>
                            </div>
                            
                            <div class="field">
                                <label class="label has-text-white">Check-out Date</label>
                                <p class="control">
                                    <input class="input" name="date2" type="date" placeholder="e.g 3">
                                </p>
                            </div>

                            <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-link" name="submit">Submit</button>
                                </div>
                                <div class="control">
                                    <button class="button is-text has-text-grey">Cancel</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
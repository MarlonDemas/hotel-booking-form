<?php
    require_once "class.user.php";

    $user = new User;
    $register="";
    $passErr = 'Passwords do not match!';
    $userErr = 'Username already exists, please try again';
    $success = 'Registration successful';

    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $uname = $_POST['user'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];

        $register = $user->reg_user($fname, $uname,$pass, $cpass);
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <style>
        .hero {
                background-image: url("img/pexels-photo-189296.jpeg");
                background-size: cover;
                background-repeat: no-repeat;
            }

        body .hero .navbar {
            background: rgba(255,255,255,0.4);
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <section class="hero is-fullheight has-background">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                    <h3 class="title is-5 has-text-weight-bold has-text-black is-uppercase">BookINN</h3>
                </a>
            </div>
        </nav>
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <div class="box">
                        <h3 class="title has-text-black">Sign Up</h3>
                        <p class="subtitle has-text-black">Please sign up to proceed.</p>
                        <p>
                            <?php
                                if($register == $success){
                                    echo '<div class="notification is-success">Registration successful <a href="login.php">Click here</a> to login</div>';
                                } else if($register == $userErr){
                                    echo '<div class="notification is-danger">'.$userErr.'</div>';
                                } else if($register == $passErr){
                                    echo '<div class="notification is-danger">'.$passErr.'</div>';
                                }
                            ?>
                        </p>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="field">
                                <div class="control">
                                    <input class="input is-large" name="fname" required type="text" placeholder="Your Full Name"
                                        autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" name="user" required type="text" placeholder="Your Username"
                                        autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" name="pass" required type="password" placeholder="Your Password">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" name="cpass" required type="password" placeholder="Confirm Password">
                                </div>
                            </div>
                            
                            <button class="button is-block is-info is-large is-fullwidth" name="submit">Sign Up</button>
                            <hr>
                            Already a member?
                            <a href="../">Login Here</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
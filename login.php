<?php
    session_start();

    require_once "classes/class.user.php";

    // Instantiating my user class
    $user = new User;

    // Initializing variables
    $login ="";
    $userErr ="Invalid username";
    $passErr ="Password incorrect";

    if (isset($_POST['submit'])) {
        $uname = trim($_POST['user']);
        $pass = trim($_POST['pass']);

        $login = $user->check_login($uname, $pass);

        if($login === true){
            header("location:home.php");
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
                    <h3 class="title is-5 has-text-weight-bold has-text-black">BookINN</h3>
                </a>
            </div>
        </nav>
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <div class="box">
                        <h3 class="title has-text-black">Login</h3>
                        <p class="subtitle has-text-black">Please login to proceed.</p>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

                            <p>
                                <?php
                                        if($login == $userErr){
                                            echo 
                                            '<div class="notification is-danger">
                                            <span class="icon">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span> '
                                            .$userErr.
                                            '</div>';
                                        } else if($login == $passErr) {
                                            echo 
                                            '<div class="notification is-danger">
                                            <span class="icon">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span> '
                                            .$passErr.
                                            '</div>';
                                        }
                                    ?>
                            </p>

                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input is-medium" name="user" required="" type="text" autofocus="" placeholder="Your Username">
                                    <span class="icon is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input is-medium" name="pass" required="" type="password" placeholder="Your Password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>

                            <button name="submit" class="button is-block is-info is-medium is-fullwidth">Login</button>
                            <hr>
                            Don't have an account?
                            <a href="signup.php">Sign Up</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
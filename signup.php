<?php
    require_once "class.user.php";

    $user = new User;
    $register="";
    $passErr = 'Passwords do not match!';
    $userErr = 'Username already exists, please try again';
    $success = 'Registration successful';

    if (isset($_POST['submit'])) {
        $fname = trim($_POST['fname']);
        $uname = trim($_POST['user']);
        $pass = trim($_POST['pass']);
        $cpass = trim($_POST['cpass']);

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
                    <h3 class="title is-5 has-text-weight-bold has-text-black">BookINN</h3>
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
                                    echo 
                                    '<div class="notification is-success">
                                    <span class="icon">
                                        <i class="far fa-thumbs-up"></i>
                                    </span> 
                                    Registration successful <a href="login.php">Click here</a> to login</div>';
                                } else if($register == $userErr){
                                    echo 
                                    '<div class="notification is-danger">
                                    <span class="icon">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span> '
                                    .$userErr.
                                    '</div>';
                                } else if($register == $passErr){
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
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium" name="fname" required type="text" placeholder="Your Full Name"
                                        autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input is-medium" name="user" required type="text" placeholder="Your Username">
                                    <span class="icon is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input is-medium" name="pass" required type="password" placeholder="Your Password">
                                    <span class="icon is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input is-medium" name="cpass" required type="password" placeholder="Confirm Password">
                                    <span class="icon is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>

                            </div>

                            <button class="button is-block is-info is-medium is-fullwidth" name="submit">Sign Up</button>
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
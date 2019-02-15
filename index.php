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
                        <h3 class="title is-5 has-text-weight-bold has-text-black is-uppercase">BookINN</h3>
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
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" required name="user" type="user" placeholder="Your Username" autofocus="">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" name="pass" required type="password" placeholder="Your Password">
                                    </div>
                                </div>
                                <button name="submit" class="button is-block is-info is-large is-fullwidth">Login</button>
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
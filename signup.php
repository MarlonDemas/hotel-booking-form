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
        </style>
    </head>
    <body>
        <section class="hero is-fullheight has-background">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">                       
                        <div class="box">
                        <h3 class="title has-text-black">Sign Up</h3>
                        <p class="subtitle has-text-black">Please sign up to proceed.</p>
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" name="user" type="user" placeholder="Your Username" autofocus="">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" name="pass" type="password" placeholder="Your Password">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" name="cpass" type="password" placeholder="Re-type Password">
                                    </div>
                                </div>
                                <button class="button is-block is-info is-large is-fullwidth" name="submit">Sign Up</button>
                                <hr>
                                Already a member? 
                                <a href="../">Login</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
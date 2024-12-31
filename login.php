<?php
include("database.php");
session_start();
if (isset($_SESSION['email'])) {
    header("Location: http://localhost/TS-01Test/property.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Crud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/global_fonts_style.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/responsive.css" type="text/css" rel="stylesheet">
</head>

<body>

    <section class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Property Website</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="nav-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navs">
                        <ul>

                            <li><a href="<?= site_url('signup.php'); ?>">Sign Up</a></li>
                            <li><a href="<?= site_url('login.php'); ?>" class="active">Login</a></li>
                            <li><a href="<?= site_url('property.php'); ?>">Add Property</a></li>
                            <li><a href="<?= site_url('property-list.php'); ?>">List Property</a></li>
                            <li><a href="<?= site_url('search-page.php'); ?>">Search Property</a></li>

                        </ul>

                        <a href="#" class="mobile-icon"><i class="fa fa-bars" aria-hidden="true"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content paddnig80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-width">
                        <h2>Login</h2>
                        <form class="login-form" action="./process_login.php" method="post" id="login_form">

                            <div class="form-field">
                                <label>Email Address*</label>
                                <input type="email" name="email" placeholder="Enter your Email Address" required>
                            </div>
                            <div class="form-field">
                                <label>Password*</label>
                                <input type="password" name="password" placeholder="Enter Password" required>
                                <div class="formcheck">
                                    <input type="checkbox" id="remember" checked>
                                    <label for="remember">Remember me</label>
                                </div>
                                <a href="#" class="forgetpwd">forget password?</a>
                            </div>

                            <div class="form-field">
                                <input type="submit" value="Login">
                            </div>

                            <p class="alredy-sign">Sign up <a href="signup.php"><u>Now</u></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#login_form").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });
        });
    </script>
</body>

</html>
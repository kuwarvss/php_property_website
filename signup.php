<?php
include_once('database.php');
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .error {
      color: red;
    }
  </style>
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
              <li><a href="<?= site_url('signup.php'); ?>" class="active">Sign Up</a></li>
              <li><a href="<?= site_url('login.php'); ?>">Login</a></li>
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

  <div id="error-message"></div>
  <div id="success-message"></div>

  <section class="main-content paddnig80">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="main-width">
            <?php
            if (isset($_GET['error'])) {
              echo '<div class="error">' . htmlspecialchars($_GET['error']) . '</div>';
            }
            ?>
            <h2>Sign Up</h2>
            <form class="signup-form" id="signupForm" action="register.php" method="POST" enctype="multipart/form-data">
              <div class="wd70">
                <div class="form-field">
                  <label>First Name*</label>
                  <input type="text" name="first_name" id="first_name" placeholder="Enter your First Name">
                </div>
                <div class="form-field">
                  <label>Last Name*</label>
                  <input type="text" name="last_name" id="last_name" placeholder="Enter your Last Name">
                </div>
              </div>

              <div class="wd30">
                <div class="upload-picture">
                  <div class="fileUpload">
                    <input type="file" name="image" id="image" class="upload" />
                  </div>
                  <label>Upload Image</label>
                </div>
              </div>

              <div class="form-field">
                <label>Email Address*</label>
                <input type="email" name="email" id="email" placeholder="Enter your Email Address">
              </div>
              <div class="form-field">
                <label>Password*</label>
                <input type="password" id="password" name="password" placeholder="Enter Password">
              </div>
              <div class="form-field">
                <label>Confirm Password*</label>
                <input type="password" name="con_pass" id="con_pass" placeholder="Re-enter Password">
              </div>
              <div class="form-field">
                <label>Phone Number* </label>
                <input type="tel" name="number" id="number" placeholder="Enter your Phone Number">
              </div>

              <div class="form-field">
                <label>Address* </label>
                <textarea placeholder="Enter your Address" name="address" id="address"></textarea>
              </div>

              <div class="form-field">
                <input type="submit" value="submit" id="save-data">
              </div>

              <p class="alredy-sign">Already Sign up <a href="login.php"><u>Login Now</u></a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <!-- <script src="js/script.js" type="text/javascript"></script> -->
  <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

  <script>
    $(document).ready(function() {
      $("#signupForm").validate({
        rules: {
          first_name: {
            required: true,
          },
          last_name: {
            required: true,
          },
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 6
          },
          con_pass: {
            required: true,
            equalTo: "#password"
          },
          number: {
            required: true,
          },
          address: {
            required: true
          },
          image: {
            required: true,
            validImage: true // Apply custom image validation
          }
        },
        messages: {
          first_name: {
            required: "Please enter your first name",
          },
          last_name: {
            required: "Please enter your last name",
          },
          email: {
            required: "Please enter your email address",
            email: "Please enter a valid email address"
          },
          password: {
            required: "Please enter a password",
            minlength: "Password must be at least 6 characters long"
          },
          con_pass: {
            required: "Please confirm your password",
            equalTo: "Passwords do not match"
          },
          number: {
            required: "Please enter your phone number"
          },
          address: {
            required: "Please enter your address"
          },
          image: {
            required: "Please upload an image"
          }
        },
        errorPlacement: function(error, element) {
          error.addClass('error');
          error.insertAfter(element);
        },
        submitHandler: function(form) {
          form.submit();
        }
      });

    });
  </script>
</body>

</html>
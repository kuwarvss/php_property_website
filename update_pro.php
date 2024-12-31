<?php
include("database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>PHP Crud</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
  <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
  <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <link href="css/global_fonts_style.css" type="text/css" rel="stylesheet">
  <link href="css/style.css" type="text/css" rel="stylesheet">
  <link href="css/responsive.css" type="text/css" rel="stylesheet">
  <style>
    .error {
      color: red;
    }
  </style>
</head>

<body>
  <section>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Edit Your profile <?php echo $_SESSION['fullname'] ?> </h4>
            </div>
            <div class="card-body">
              <?php
              require_once("database.php");

              $id = $_GET['id'];

              $sql = "SELECT * FROM userdata WHERE id = $id";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {
              ?>
                  <form class="form-field" action="update_data.php" method="post" enctype="multipart/form-data" id="update_form">
                    <div class="form-field">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control">
                    </div>
                    <div class="form-field">
                      <label for="">First name</label>
                      <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" class="form-control" placeholder="Enter your first name">
                    </div>
                    <div class="form-field">
                      <label for="">Last name</label>
                      <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" class="form-control" placeholder="Enter your last name">
                    </div>
                    <div class="form-field">
                      <label for="">Email Address*</label>
                      <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="form-field">
                      <label for="">Password*</label>
                      <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>" class="form-control">
                    </div>
                    <div class="form-field">
                      <label for="">Confirm Password*</label>
                      <input type="password" name="con_pass" value="<?php echo $row['confirmpass']; ?>" class="form-control" placeholder="Re-enter password">
                    </div>
                    <div class="form-field">
                      <label for="">Image</label>
                      <input type="file" name="image" class="form-control" placeholder="Enter your profile img">
                      <input type="hidden" name="image_old" value="<?php echo $row['image']; ?>">
                      <img src="<?php echo "uploads/" . $row['image']; ?>" width="75" alt="image">
                    </div>
                    <div class="form-field">
                      <label for="">Phone Number*</label>
                      <input type="number" name="number" value="<?php echo $row['phonenumber']; ?>" class="form-control" placeholder="Enter your Phone Number">
                    </div>
                    <div class="form-field">
                      <label for="">Address*</label>
                      <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control" placeholder="Enter your address">
                    </div>
                    <div class="form-field">
                      <button type="submit" name="save" class="btn btn-primary">SAVE</button>
                    </div>
                  </form>
              <?php
                }
              } else {
                redirect("signup.php");
                // header("location: http://localhost/TS-01Test/signup.php");
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script> -->

  <script>
    jQuery(document).ready(function() {
      $("#update_form").validate({
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

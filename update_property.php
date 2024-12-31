<?php
session_start();
if(!isset($_SESSION['email'])) {
    header("Location: http://localhost/TS-01Test/login.php");
    exit();
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

    <section class="main-content paddnig80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-width">
                        <h3>Hello <?php echo $_SESSION['fullname']; ?></h3>
                        <h2>Property update Form</h2>

                        <?php
                        require_once("database.php");

                        $uid = $_GET['id'];

                        $sql = "SELECT * FROM property_info WHERE id = $uid";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0){
                            foreach ($result as $row){
                                ?>
                                <form class="Property-form" action="edit_property.php" method="post" enctype="multipart/form-data" id="update_property">
                                    <div class="wd70">
                                        <div class="form-field">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        </div>
                                        <div class="form-field">
                                            <label>Property Name*</label>
                                            <input type="text" placeholder="Enter Property Name"  value="<?php echo $row['property_name'];?>" name="property_name" >
                                        </div>
                                        <div class="form-field">
                                            <label>Property Type*</label>
                                            <select name="property_type" required>
                                                <option value="">Property Type</option>
                                                <option value="rent" <?php echo ($row['property_type'] == 'rent') ? 'selected' : ''; ?>>Rent</option>
                                                <option value="sell" <?php echo ($row['property_type'] == 'sell') ? 'selected' : ''; ?>>Sell</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="wd30">
                                        <div class="upload-picture">
                                            <div class="fileUpload">
                                                <label>Property Image</label>
                                                <input type="file" name="property_image">
                                                <input type="hidden" name="old_property_image" value="<?php echo $row['property_image']; ?>">
                                                <img src="<?php echo "uploads/" . $row['property_image'];?>" width="75" alt="image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-field">
                                        <label>Property Price*</label>
                                        <input type="number" placeholder="Enter Property Price" value="<?php echo $row['property_price']; ?>" name="property_price"  >
                                    </div>
                                    <div class="form-field">
                                        <label>Property Location*</label>
                                        <input type="text" placeholder="Enter Location" value="<?php echo $row['property_location']; ?>" name="property_location"  >
                                    </div>

                                    <div class="form-field">
                                        <label>Property Description* </label>
                                        <textarea placeholder="Enter Description" name="property_description"  ><?php echo $row['property_description']; ?></textarea>
                                    </div>

                                    <div class="form-field">
                                        <input type="submit" name="submit_form" value="Submit Form">
                                    </div>
                                </form>
                                <?php
                            }
                        } else {
                            header("location: signup.php");
                            exit();
                        }
                        ?>

                        <form action="logout.php" method="post" class="d-inline">
                            <button type='submit' name='logout-btn' class='btn btn-danger'>Logout</button>
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
        jQuery(document).ready(function() {
            $("#update_property").validate({
                rules: {
                    property_name: {
                        required: true
                    },
                    property_type: {
                        required: true
                    },
                    property_price: {
                        required: true,
                        number: true
                    },
                    property_location: {
                        required: true
                    },
                    property_description: {
                        required: true
                    },
                },
                messages: {
                    property_name: {
                        required: "Please enter the property name"
                    },
                    property_type: {
                        required: "Please select a property type"
                    },
                    property_price: {
                        required: "Please enter the property price",
                        number: "Please enter a valid number"
                    },
                    property_location: {
                        required: "Please enter the property location"
                    },
                    property_description: {
                        required: "Please enter the property description"
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

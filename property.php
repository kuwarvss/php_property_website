<?php
include("database.php");
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: http://localhost/TS-01Test/login.php");
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

    <section class="nav-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navs">
                        <ul>
                            <li><a href="<?= site_url('profile.php'); ?>">Profile</a></li>
                            <li><a href="<?= site_url('property.php'); ?>" class="active">Add Property</a></li>
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
                        <h3>Hello <?php echo $_SESSION['fullname']; ?></h3>
                        <h2>Property Form</h2>
                        <form class="Property-form" action="add_property.php" method="post" enctype="multipart/form-data" id="propertyForm">
                            <div class="wd70">
                                <div class="form-field">
                                    <label>Property Name*</label>
                                    <input type="text" placeholder="Enter Property Name" name="property_name">
                                </div>
                                <div class="form-field">
                                    <label>Property Type*</label>
                                    <select name="property_type">
                                        <option value="property-type">Property Type</option>
                                        <option value="rent">Rent</option>
                                        <option value="sell">Sell</option>
                                    </select>
                                </div>
                            </div>
                            <div class="wd30">
                                <div class="upload-picture">
                                    <div class="fileUpload">
                                        <input type="file" name="image" /> <!-- class="upload" -->
                                    </div>
                                    <label>Property Image</label>
                                </div>
                            </div>
                            <div class="form-field">
                                <label>Property Price*</label>
                                <input type="number" placeholder="Enter Property Price" name="property_price">
                            </div>
                            <div class="form-field">
                                <label>Property Location*</label>
                                <input type="text" placeholder="Enter Location" name="property_location">
                            </div>
                            <div class="form-field">
                                <label>Property Description*</label>
                                <textarea placeholder="Enter Description" name="property_description"></textarea>
                            </div>
                            <div class="form-field">
                                <input type="submit" value="submit">
                            </div>
                        </form>
                        <form action="logout.php" method="post" class="d-inline">
                            <button type='submit' name='logout-btn' class='btn btn-danger'>Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            $("#propertyForm").validate({
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
                    image: {
                        required: true,
                        extension: "jpg|jpeg|png|gif"
                    }
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
                    image: {
                        required: "Please upload a property image",
                        extension: "Please upload a file in jpg, jpeg, png, or gif format"
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
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
                            <li><a href="<?= site_url('property.php'); ?>">Add Property</a></li>
                            <li><a href="<?= site_url('property-list.php'); ?>">List Property</a></li>
                            <li><a href="<?= site_url('search-page.php'); ?>" class="active">Search Property</a></li>

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
                        <h2>Property Search Form</h2>
                        <form class="search-form" action="search_pro.php" method="post" enctype="multipart/form-data" id="search-form">
                            <div class="form-field width50">
                                <label>Property Name</label>
                                <input type="text" name="property_name" placeholder="Search by property name">
                            </div>

                            <div class="form-field width50">
                                <label>Property Type</label>
                                <select name="property_type">
                                    <option value="property-type">Search by Property Type</option>
                                    <option value="rent">Rent</option>
                                    <option value="sell">Sell</option>
                                </select>
                            </div>

                            <div class="form-field width50">
                                <label>Enter minimum price </label>
                                <input type="number" name="minimum_price" placeholder="Enter minimum price">
                            </div>

                            <div class="form-field width50">
                                <label>Enter maximum price </label>
                                <input type="number" name="maximum_price" placeholder="Enter maximum price">
                            </div>


                            <div class="form-field">
                                <label>Property Location</label>
                                <input type="text" name="property_location" placeholder="Search by location">
                            </div>



                            <div class="form-field">
                                <input type="submit" name="submit" value="Search">
                            </div>

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
            $('#search-form').validate({
                rules: {
                    'minimum_price': {
                        required: true,
                        number: true
                    },
                    'maximum_price': {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    'minimum_price': {
                        required: 'Please enter minimum price',
                        number: 'Please enter a valid number'
                    },
                    'maximum_price': {
                        required: 'Please enter maximum price',
                        number: 'Please enter a valid number'
                    }
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.addClass('alert alert-danger');
                    error.appendTo(element.parent());
                }
            });
        });
    </script>
</body>

</html>
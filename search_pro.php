<?php

include "database.php";
session_start();


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
        .property-image {
            width: 150px;
            height: auto;
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

    <div class="container my-5">
        <table class="table">

            <section class="main-content paddnig80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-width">

                                <h2>Search Result</h2>
                                <?php
                                if (isset($_POST['submit'])) {
                                    $searchConditions = "";
                                    $property_name = mysqli_real_escape_string($conn, $_POST['property_name']);
                                    $property_type = mysqli_real_escape_string($conn, $_POST['property_type']);
                                    $property_location = mysqli_real_escape_string($conn, $_POST['property_location']);
                                    $min_price = mysqli_real_escape_string($conn, $_POST['minimum_price']);
                                    $max_price = mysqli_real_escape_string($conn, $_POST['maximum_price']);


                                    if (empty($property_name) && empty($property_type) && empty($property_location) && empty($min_price) && empty($max_price)) {
                                        echo '<script>alert("Please provide at least one search criterion.");</script>';
                                        exit;
                                    }


                                    if (!empty($property_name)) {
                                        $searchConditions .= "property_name LIKE '%$property_name%' AND ";
                                    }
                                    if (!empty($property_type)) {
                                        $searchConditions .= "property_type LIKE '%$property_type%' AND ";
                                    }
                                    if (!empty($property_location)) {
                                        $searchConditions .= "property_location LIKE '%$property_location%' AND ";
                                    }
                                    if (!empty($min_price) && !empty($max_price)) {
                                        $searchConditions .= "property_price >= $min_price AND property_price <= $max_price AND ";
                                    }


                                    $searchConditions = rtrim($searchConditions, "AND ");


                                    if (!empty($searchConditions)) {
                                        $sql = "SELECT * FROM property_info WHERE $searchConditions";
                                        $result = mysqli_query($conn, $sql) or die("Query unsuccessful");
                                        if (mysqli_num_rows($result) > 0) {

                                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                                <div class="product-list">
                                                    <img src="<?php echo  "uploads/" . $row['property_image']; ?>" alt="home" class="property-img property-image">
                                                    <ul>
                                                        <input type="hidden" <?php echo $row['id']; ?>>
                                                        <li><img src="images/icon-user.png" alt="user"><strong>Property Name: </strong><?php echo $row['property_name']; ?></li>
                                                        <li><img src="images/icon-home.png" alt="home"><strong>Property Type: </strong><?php echo $row['property_type']; ?></li>
                                                        <li><img src="images/icon-doller.png" alt="doller"><strong>Price: </strong>$<?php echo $row['property_price']; ?></li>
                                                        <li><img src="images/icon-location.png" alt="location"><strong>Location: </strong><?php echo $row['property_location']; ?></li>
                                                    </ul>
                                                    <p><?php echo $row['property_description']; ?></p>
                                                </div><br>
                                <?php
                                            }
                                        } else {
                                            echo '<h2 class="text-danger">Data not found</h2>';
                                        }
                                        echo '<a href="search-page.php"><button type="button" class="btn btn-success">Back</button></a>' . "<br> <br>";
                                        echo '<a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>';
                                    } else {
                                        echo '<h2 class="text-danger">Please provide at least one search criterion.</h2>';
                                    }
                                }
                                ?>
        </table>
    </div>

    <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
</body>

</html>
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
                    <h1>Property Website </h1>

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
                            <li><a href="<?= site_url('property-list.php'); ?>" class="active">List Property</a></li>
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

                        <h4>Hello <?php echo  $_SESSION["fullname"]; ?></h4> <br>
                        <h2>Property Listings</h2>
                        <?php

                        require_once("database.php");
                        $sql = "SELECT * FROM property_info";
                        $result = mysqli_query($conn, $sql) or die("Unsuccessful query");


                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                                <div class="product-list">
                                    <img src="<?php echo  "uploads/" . $row['property_image']; ?>" alt="home" class='property-image property-img' alt='Property Image'>

                                    <ul>
                                        <input type="hidden" <?php echo $row['id']; ?>>
                                        <li><img src="images/icon-user.png" alt="user"><strong>Property Name: </strong><?php echo $row['property_name']; ?></li>
                                        <li><img src="images/icon-home.png" alt="home"><strong>Property Type: </strong><?php echo  $row['property_type']; ?></li>
                                        <li><img src="images/icon-doller.png" alt="doller"><strong>Price: </strong>$<?php echo  $row['property_price']; ?></li>
                                        <li><img src="images/icon-location.png" alt="location"><strong>Location: </strong><?php echo  $row['property_location']; ?></li>
                                    </ul>
                                    <p><?php echo $row['property_description']; ?></p><br>

                                    <?php if ($row['useremail'] == $_SESSION['email']) { ?>
                                        <a href="update_property.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success">Edit Property</button></a>
                                        <br><br>

                                        <form action="delete_property.php?id=<?php echo $row['id']; ?>" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="delete_property" class="btn btn-danger">Delete Property</button>
                                        </form>
                                    <?php } ?>
                                </div>
                        <?php
                            }
                        } else {
                            header("Location:http://localhost/TS-01Test/property.php");
                            exit();
                        }

                        mysqli_close($conn);
                        ?>

                        <a href="#" class="load-btn">Load More</a><br><br>

                        <form action="logout.php" method="post" class="d-inline">
                            <button type='submit' name='logout-btn' class='btn btn-danger'>Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
</body>

</html>
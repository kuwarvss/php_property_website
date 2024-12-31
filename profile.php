
<?php
 
session_start();
if(!isset($_SESSION['email'])) {
    header("Location: http://localhost/TS-01Test/login.php");
    
    }
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
    
    
</head>

<body>

    <section class="main-content padding80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-width">
                        <h3> Hello <?php echo $_SESSION['fullname'] ?></h3>

                        <div class="container">
                            <div class="header">
                                <h1>Admin Dashboard</h1>
                            </div>
                            <div class="dashboard">
                            <div class="card">
                                   
                                   <a href="showuserdata.php">
                                       <button>Profile Update</button>
                                   </a>
                               </div>


                                <div class="card">
                                     
                                    <a href="property.php">
                                        <button>Add Property</button>
                                    </a>
                                </div>

                        
                            </div>
                        </div>


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
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>



</body>

</html>
<?php
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
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/global_fonts_style.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">

    <link href="css/responsive.css" type="text/css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-14">
                <div class="card">
                    <div class="card-header">
                        <h4>profile <?php echo $_SESSION['fullname'] ?> </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-success table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First_name</th>
                                    <th scope="col">Last_name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">phonenumber</th>
                                    <th scope="col">address</th>
                                    <th scope="col">image</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                require_once("database.php");
                                $useremail = $_SESSION['email'];
                                // $fetch_data = "SELECT * FROM userdata";
                                $fetch_data = "SELECT * FROM userdata WHERE email='$useremail'";
                                $result = mysqli_query($conn, $fetch_data);

                                if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $row) {

                                ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['first_name']; ?></td>
                                            <td><?php echo $row['last_name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['password']; ?></td>
                                            <td><?php echo $row['phonenumber']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td>
                                                <img src="<?php echo "uploads/" . $row['image']; ?>" width="75" height="75" alt="image">
                                            </td>
                                            <?php if ($row['email'] == $_SESSION['email']) {  ?>
                                                <td>
                                                    <a href="update_pro.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit Profile</a>
                                                </td>
                                                <td>
                                                    <form action="delete_profile.php" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="delete_profile" class="btn btn-danger">Delete Profile</button>
                                                    </form>

                                                </td>
                                            <?php } ?>

                                        </tr>

                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr colspan="8">No Record Found</tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <a href="profile.php" class="btn btn-success">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


</body>

</html>
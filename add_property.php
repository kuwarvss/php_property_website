<?php
session_start();
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $propertyName = mysqli_real_escape_string($conn, $_POST["property_name"]);
    $propertyType = mysqli_real_escape_string($conn, $_POST["property_type"]);
    $propertyPrice = mysqli_real_escape_string($conn, $_POST["property_price"]);
    $propertyLocation = mysqli_real_escape_string($conn, $_POST["property_location"]);
    $propertyDescription = mysqli_real_escape_string($conn, $_POST["property_description"]);

    $useremail = $_SESSION['email'];


    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];

    // Move uploaded file to designated directory
    $upload_directory = "uploads/";
    if (!move_uploaded_file($file_tmp, $upload_directory . $file_name)) {

        redirect("property.php?error=Could not upload the image");
        exit();
    }

    $sql = "INSERT INTO property_info (property_name, property_type, property_price, property_location, property_description, property_image ,useremail)
    VALUES ('$propertyName', '$propertyType','$propertyPrice','$propertyLocation','$propertyDescription','$file_name','$useremail')";

    $result = mysqli_query($conn, $sql) or die("Unsuccessful query");

    redirect("property-list.php");
    exit();
} else {
    redirect('property.php');
    exit();
}

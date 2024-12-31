<?php
session_start();
require_once("database.php");

if (isset($_POST['submit_form'])) {

    $uid = $_POST['id'];
    $propertyName = $_POST['property_name'];
    $propertyType = $_POST['property_type'];
    $propertyPrice = $_POST['property_price'];
    $propertyLocation = $_POST['property_location'];
    $propertyDescription = $_POST['property_description'];

    $oldPro_image = $_POST['old_property_image'];

    if ($_FILES['property_image']['name'] != '') {
        $newPro_image = $_FILES['property_image']['name'];
        $file_tmp = $_FILES['property_image']['tmp_name'];
        $upload_directory = "uploads/";
        $upload_path = $upload_directory . $newPro_image;

        if (file_exists($upload_path)) {
            redirect("property-list.php?error=Image already exists.");
            exit();
        }
        if (!move_uploaded_file($file_tmp, $upload_path)) {
            redirect("property-list.php?error=Failed to upload image");
            exit();
        }
        $image = $newPro_image;
    } else {
        $image = $oldPro_image;
    }

    $sql = "UPDATE property_info SET  property_name = '$propertyName', property_type = '$propertyType', property_price = '$propertyPrice', property_location = '$propertyLocation', property_description = '$propertyDescription', property_image = '$image' WHERE id = '$uid'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        redirect("property-list.php?error=Failed to update property");
        exit();
    }
    redirect("property-list.php");
    exit();
} else {

    redirect("property-list.php");
    exit();
}

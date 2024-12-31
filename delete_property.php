<?php
session_start();
require_once("database.php");
if (isset($_POST['delete_property'])) {

    $uid = $_POST['id'];
    $image = $_POST['image'];

    $sql = "DELETE FROM property_info WHERE id = {$uid}";
    $result = mysqli_query($conn, $sql) or die("Unsuccessful Query");

    if ($result) {
        unlink($upload_directory . $image);
        redirect("property-list.php");
        exit();
    } else {
        redirect("property-list.php");
        exit();
    }
}

mysqli_close($conn);

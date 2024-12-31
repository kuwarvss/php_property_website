<?php
session_start();
require_once("database.php");

if (isset($_POST['save'])) {
    $uid = $_POST["id"];
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpass = $_POST["con_pass"];
    $phoneNumber = $_POST["number"];
    $address = $_POST["address"];
    $old_image = $_POST['image_old'];

    // Handle image upload
    if ($_FILES['image']['name'] != '') {
        $new_image = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $upload_directory = "uploads/";
        $upload_path = $upload_directory . $new_image;

        if (file_exists($upload_path)) {
            redirect("showuserdata.php?error=Image already exists.");
            exit();
        }

        if (!move_uploaded_file($file_tmp, $upload_path)) {
            redirect("showuserdata.php?error=Failed to upload image.");
            exit();
        }

        $image = $new_image;
    } else {
        $image = $old_image;
    }

    $sql = "UPDATE userdata SET 
                first_name = '{$firstName}', 
                last_name = '{$lastName}', 
                email = '{$email}', 
                password = '{$password}', 
                confirmpass = '{$confirmpass}', 
                phonenumber = '{$phoneNumber}', 
                address = '{$address}', 
                image = '{$image}' 
            WHERE id = '{$uid}'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Update session variables
        $_SESSION['email'] = $email;
        $_SESSION['fullname'] = $firstName . ' ' . $lastName;
        redirect("showuserdata.php");
        exit();
    } else {
        redirect("showuserdata.php?error=Failed to update user data.");
        exit();
    }
} else {
    redirect("update_pro.php");
    exit();
}

<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmpass = mysqli_real_escape_string($conn, $_POST["con_pass"]);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST["number"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);

    // Check if email already exists
    $check_email_query = "SELECT * FROM userdata WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        // Email already exists
        $error_message = "Email already registered. Please use a different email.";
        redirect("signup.php?error=" . urlencode($error_message));
        exit();
    }

    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];

    // Move uploaded file to designated directory
    $upload_directory = "uploads/";
    if (!move_uploaded_file($file_tmp, $upload_directory . $file_name)) {
        $error_message = "File upload failed.";
        redirect("signup.php?error=" . urlencode($error_message));
        exit();
    }

    $sql = "INSERT INTO userdata (first_name, last_name, email, password, confirmpass, phonenumber, address, image) 
            VALUES ('$firstName', '$lastName', '$email', '$password', '$confirmpass', '$phoneNumber', '$address', '$file_name')";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        $error_message = "Unsuccessful query: " . mysqli_error($conn);
        redirect("signup.php?error=" . urlencode($error_message));
        exit();
    }

    redirect("login.php");
    exit();
} else {
    redirect("signup.php");
    exit();
}
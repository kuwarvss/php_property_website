<?php
session_start();

require_once("database.php");
$errorMesssage = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM userdata WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql) or  die("Unsuccessful query");

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['first_name'];
        $_SESSION['name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['fullname'] = $user['first_name'] . '' . $user['last_name'];

        redirect("profile.php");

        exit;

         
    } else {
         
        redirect("login.php");

        exit;
    }
}

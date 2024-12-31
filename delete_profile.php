<?php
// session_start();
// require_once("database.php");
// if (isset($_POST['delete_profile'])) {
//     $uid = $_POST['id'];
//     $image = $_POST['image'];

//     $sql = "DELETE FROM userdata WHERE id = {$uid}";
//     $result = mysqli_query($conn, $sql) or die("Unsuccessful Query");

//     if ($result) {
//         unlink($upload_directory . $image);
//         redirect("showuserdata.php");
//         exit();
//     } else {
//         redirect("showuserdata.php");
//         exit();
//     }
// }

// mysqli_close($conn);


session_start();
require_once("database.php");
if (isset($_POST['delete_profile'])) {
    $uid = $_POST['id'];
    $image = $_POST['image'];

    $sql = "DELETE FROM userdata WHERE id = {$uid}";
    $result = mysqli_query($conn, $sql) or die("Unsuccessful Query");

    if ($result) {
        unlink($upload_directory . $image);

        session_unset();
        session_destroy();
        redirect("showuserdata.php");
        exit();
    } else {
        redirect("showuserdata.php");
        exit();
    }
}

mysqli_close($conn);



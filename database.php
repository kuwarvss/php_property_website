<?php 
$hostname = "localhost";
$dbuser  = "root";
$dbpassword = "";
$dbname = "usersaccount";

$conn = mysqli_connect($hostname,$dbuser,$dbpassword,$dbname)  or die("Connection Failed");


if (!defined('SITE_URL')) {
    define('SITE_URL', 'http://localhost/TS-01Test/');
}


if (!function_exists('site_url')) {
    function site_url($slug)
    {
        echo SITE_URL . $slug;
    }
}

if (!function_exists('redirect')) {
    function redirect($page)
    {
        $redirectTo = SITE_URL . $page;
        header("Location: $redirectTo");
        exit;
    }
}
?>
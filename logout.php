<?php
include("database.php");

session_start();

session_unset();

session_destroy();

redirect("login.php");


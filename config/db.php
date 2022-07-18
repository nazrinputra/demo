<?php

// Enable us to use Headers
ob_start();

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["id"])) {
    $logged_in = true;
} else {
    $logged_in = false;
}

$hostname = "localhost";
$username = "root";
$password = "Passw0rd";
$dbname = "demo";

$connection = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.");

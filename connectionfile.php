<?php

$host = "localhost";
$user = "root";
$password = "root";
$database = "demoDB";

$conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>


<?php
$hostname = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "personal_db";
$conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong!");
}
?>
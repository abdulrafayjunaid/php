<?php
$host = "localhost";
$user = "root";  // change if needed
$pass = "";      // change if needed
$db   = "shop";

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
include "../connect.php";

$id = $_POST['id'];       // matches the hidden input name
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

// run update query
mysqli_query($con, "UPDATE users SET email='$email', password='$password', role='$role' WHERE ID='$id'");

// redirect back to index
header("Location: index.php");
exit;
?>

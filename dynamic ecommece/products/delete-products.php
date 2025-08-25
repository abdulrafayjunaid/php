<?php
include "../connect.php";
$id = $_GET['id'];
mysqli_query($con, "DELETE FROM products WHERE id=$id");
header("Location: dashboard.php");
?>

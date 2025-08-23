<?php
include '../config.php';
// session_start();
// if($_SESSION['role']!='admin') die("Access denied");

$plants = $conn->query("SELECT * FROM plants")->num_rows;
$blogs = $conn->query("SELECT * FROM blogs")->num_rows;
$users = $conn->query("SELECT * FROM users")->num_rows;
?>
<h2>Admin Dashboard</h2>
<p>Total Plants: <?php echo $plants;?></p>
<p>Total Blogs: <?php echo $blogs;?></p>
<p>Total Users: <?php echo $users;?></p>
<a href="add_plant.php">Add Plant</a> | <a href="add_blog.php">Add Blog</a>
<a href="../index.php">return to website</a>
    
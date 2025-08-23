<?php 
include 'navbar.php'; 
include 'config.php';
session_start();
?>

<h2>Gardening Blogs</h2>

<?php
// Handle delete request (only for admin)
if(isset($_GET['delete']) && isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    $blog_id = intval($_GET['delete']);
    
    // First, remove image file
    $res = $conn->query("SELECT image FROM blogs WHERE blog_id=$blog_id");
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $image_path = 'uploads/'.$row['image'];
        if(file_exists($image_path)) unlink($image_path);
    }

    // Delete from database
    $conn->query("DELETE FROM blogs WHERE blog_id=$blog_id");
    echo "<p style='color:green;'>Blog deleted!</p>";
}

// Fetch all blogs
$result = $conn->query("SELECT * FROM blogs ORDER BY created_at DESC");
while($blog = $result->fetch_assoc()){
    echo '<div class="card" style="border:1px solid #ccc; padding:10px; margin:10px 0;">';
    echo '<h3>'.$blog['title'].'</h3>';
    echo '<img src="uploads/'.$blog['image'].'" width="200"><br>';
    echo '<p>'.$blog['content'].'</p>';

    // Show delete button only to admin
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
        echo '<a href="blogs.php?delete='.$blog['blog_id'].'" style="color:red;" onclick="return confirm(\'Are you sure?\')">Delete</a>';
    }

    echo '</div>';
}
?>

<?php include 'footer.php'; ?>
  
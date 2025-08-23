<?php
include '../config.php';
session_start();

// Only admin can access
if($_SESSION['role'] != 'admin') die("Access denied");

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $title = $_POST['title'];
    $content = $_POST['content'];

    // Handle image upload
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $upload_dir = '../uploads/'; // folder to store uploaded images
        if(!is_dir($upload_dir)) mkdir($upload_dir, 0777, true); // create folder if not exists

        $image_name = time().'_'.basename($_FILES['image']['name']); // unique filename
        $target_file = $upload_dir.$image_name;

        // Move uploaded file to folder
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
            // Insert blog with image filename
            $conn->query("INSERT INTO blogs(title, content, image) VALUES('$title', '$content', '$image_name')");
            echo "Blog added!";
            header("Location: index.php");
            exit;
        } else {
            echo "Failed to upload image!";
        }
    } else {
        echo "No image selected!";
    }
}
?>

<h2>Add Blog</h2>
<form method="post" enctype="multipart/form-data"> <!-- important: enctype -->
    Title: <input type="text" name="title" required><br>
    Content: <textarea name="content" required></textarea><br>
    Image: <input type="file" name="image" required><br>
    <input type="submit" value="Add Blog">
</form>

<?php
include '../config.php';
session_start();
if($_SESSION['role']!='admin') die("Access denied");

if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = $_POST['name'];
    $botanical = $_POST['botanical_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $care = $_POST['care_level'];
    $light = $_POST['light_requirement'];
    $water = $_POST['watering_schedule'];
    $desc = $_POST['description'];

    // Handle image upload
    if(isset($_FILES['image']) && $_FILES['image']['error']==0){
        $allowed_ext = ['jpg','jpeg','png','gif'];
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if(in_array($file_ext, $allowed_ext)){
            $new_name = uniqid('plant_', true).'.'.$file_ext;
            $upload_dir = '../uploads/'; // create this folder in your project
            if(!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

            move_uploaded_file($file_tmp, $upload_dir.$new_name);
            $image_path = 'uploads/'.$new_name; // save relative path to DB
        } else {
            die("Invalid image type. Only JPG, PNG, GIF allowed.");
        }
    } else {
        $image_path = ''; // optional: default image
    }

    $conn->query("INSERT INTO plants(name,botanical_name,category,price,care_level,light_requirement,watering_schedule,description,image)
                  VALUES('$name','$botanical','$category','$price','$care','$light','$water','$desc','$image_path')");
    echo "Plant added!";
    header("Location:admin/index.php");
}
?>

<h2>Add Plant</h2>
<form method="post" enctype="multipart/form-data">
    Name:<input type="text" name="name" required><br>
    Botanical Name:<input type="text" name="botanical_name" required><br>
    Category:<input type="text" name="category" required><br>
    Price:<input type="number" step="0.01" name="price" required><br>
    Care Level:<input type="text" name="care_level" required><br>
    Light Requirement:<input type="text" name="light_requirement" required><br>
    Watering Schedule:<input type="text" name="watering_schedule" required><br>
    Description:<textarea name="description" required></textarea><br>
    Image: <input type="file" name="image" accept="image/*" required><br>
    <input type="submit" value="Add Plant">
</form>

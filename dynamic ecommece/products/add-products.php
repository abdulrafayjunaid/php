<?php include "../connect.php"; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $img  = $_FILES['image']['name'];
    $tmp  = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/".$img);

    mysqli_query($con, "INSERT INTO products (name, description, image) VALUES ('$name','$desc','$img')");
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h2>Add Product</h2>
    <form method="POST" enctype="multipart/form-data">
      <input class="form-control mb-2" type="text" name="name" placeholder="Product Name" required>
      <textarea class="form-control mb-2" name="description" placeholder="Description" required></textarea>
      <input class="form-control mb-2" type="file" name="image" required>
      <button class="btn btn-primary">Save</button>
    </form>
  </div>
</body>
</html>

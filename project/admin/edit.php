<?php include "../connect.php"; ?>

<?php
$id = $_GET['id'];
$product = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE id=$id"));

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['description'];

    if ($_FILES['image']['name']) {
        $img  = $_FILES['image']['name'];
        $tmp  = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "../uploads/".$img);
    } else {
        $img = $product['image'];
    }

    mysqli_query($con, "UPDATE products SET name='$name', description='$desc', image='$img' WHERE id=$id");
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h2>Edit Product</h2>
    <form method="POST" enctype="multipart/form-data">
      <input class="form-control mb-2" type="text" name="name" value="<?php echo $product['name']; ?>" required>
      <textarea class="form-control mb-2" name="description"><?php echo $product['description']; ?></textarea>
      <input class="form-control mb-2" type="file" name="image">
      <button class="btn btn-primary">Update</button>
    </form>
  </div>
</body>
</html>

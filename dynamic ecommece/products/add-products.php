<?php include"../connect.php"; ?>
<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Product Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" required></textarea>
  </div>

  <div class="mb-3">
    <label>Category</label>
    <select name="category" class="form-control" required>
      <option value="Electronics">Electronics</option>
      <option value="Clothes">Clothes</option>
      <option value="Shoes">Shoes</option>
      <option value="Accessories">Accessories</option>
    </select>
  </div>

  <div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-success">Save Product</button>
</form>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $desc = $_POST['description'];
  $category = $_POST['category'];

  $image = $_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $image);

  mysqli_query($con, "INSERT INTO products (name, description, category, image) 
                      VALUES ('$name', '$desc', '$category', '$image')");
}

?>
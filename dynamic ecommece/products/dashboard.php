<!-- <?php include "../connect.php"; ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-1">
  <h1 style="color:white;
             background:green;
             height:50px;
             width:1400px;
             padding:1px 10px;
             margin-left:9%;
             margin-bottom:20px;">
             admin panel
      </h1>

  <div class="container">
    <h2 class="mb-3">Admin Dashboard</h2>
    <a href="add-products.php" class="btn btn-success mb-3">+ Add Product</a>
    <div class="row">
      <?php
        $result = mysqli_query($con, "SELECT * FROM products");
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="../uploads/<?php echo $row['image']; ?>" class="card-img-top" height="200">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['name']; ?></h5>
              <p class="card-text"><?php echo $row['description']; ?></p>
              <a href="edit-products.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
              <a href="delete-products.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Delete this product?');">Delete</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</body>
</html>

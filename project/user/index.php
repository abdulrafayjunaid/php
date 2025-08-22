<?php include "../connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h2 class="mb-3">Our Products</h2>
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
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</body>
</html>

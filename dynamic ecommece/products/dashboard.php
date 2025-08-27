<?php include "../connect.php"; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
    }
    .sidebar {
      width: 220px;
      min-height: 100vh;
      background: #343a40;
      color: white;
      padding: 20px 10px;
    }
    .sidebar a {
      display: block;
      color: white;
      padding: 10px;
      margin-bottom: 5px;
      text-decoration: none;
      border-radius: 5px;
    }
    .sidebar a:hover {
      background: #495057;
    }
    .upgrade-btn {
      background: gold !important;
      color: black !important;
      font-weight: bold;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h3 class="text-center mb-4">Admin</h3>
    <a href="dashboard.php">📊 Dashboard</a>
    <a href="user/user-home.php">👥 Users</a>
    <a href="inbox.php">📩 Inbox</a>
   <a href="../logout.php">Logout</a>
  </div>

  <!-- Main Content -->
  <div class="content">
   
    <div class="container-fluid">
      <h2 class="mb-3">Admin Dashboard</h2>
      <a href="add-products.php" class="btn btn-success mb-3">+ Add Product</a>
      <div class="row">
        <?php
          $result = mysqli_query($con, "SELECT * FROM products");
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="card mb-4 d-flex flex-row align-items-center p-3">
      <h5 class="card-title me-3 mb-0"><?php echo $row['name']; ?></h5>
      <p class="card-text me-3 mb-0"><?php echo $row['description']; ?></p>
      <img src="../uploads/<?php echo $row['image']; ?>" class="img-thumbnail me-3" height="80" width="80">
      <p class="card-text me-3 mb-0"><?php echo $row['category']; ?></p>
      <div>
    <a href="edit-products.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm me-2">Edit</a>
    <a href="delete-products.php?id=<?php echo $row['id']; ?>" 
       class="btn btn-danger btn-sm"
       onclick="return confirm('Delete this product?');">Delete</a>
  </div>

</div>

        <?php } ?>
      </div>
    </div>
  </div>
</body>
</html>


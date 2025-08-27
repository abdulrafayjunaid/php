<?php include "../connect.php";  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Our Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    a{
      color:white;
      background:#ed9418;
      text-decoration: none;
      font-family:franklin gothic;
      padding:5px;
      border-radius:5px;
    } 
  </style>
</head>
<body class="p-3">

  <!-- Navbar -->
  <!-- <nav class="navbar navbar-expand-lg navbar-custom mb-4">
    <div class="container-fluid">
      
      <!-- Left side -->
      <!-- <div class="d-flex">
        <a class="nav-link" href="home.php">Home</a>
        <a class="nav-link" href="about.php">About</a>
        <a class="nav-link" href="contact.php">Contact</a>
        <a class="nav-link" href="../logout.php">log out</a>
      </div>

       Center (blank for now) -->
      <!-- <div class="mx-auto"></div>

       Right side (Logo) -->
      <!-- <div class="logos"> 
        <a href="home.php">
          my store
        </a>
      </div>

    </div>
  </nav>  -->
  <?php include "navbar.php"; ?>

  <div class="container">
    <h1 class="mb-4 mt-3">Our Products</h1>

    <!-- Category Filter Dropdown -->
    <form method="GET" class="mb-4">
      <div class="row">
        <div class="col-md-4">
          <select name="category" class="form-select" onchange="this.form.submit()">
            <option value="">-- Select Category --</option>
            <option value="Clothes" <?php if(isset($_GET['category']) && $_GET['category']=="Clothes") echo "selected"; ?>>Clothes</option>
            <option value="Shoes" <?php if(isset($_GET['category']) && $_GET['category']=="Shoes") echo "selected"; ?>>Shoes</option>
            <option value="Electronics" <?php if(isset($_GET['category']) && $_GET['category']=="Electronics") echo "selected"; ?>>Electronics</option>
            <option value="Accessories" <?php if(isset($_GET['category']) && $_GET['category']=="Accessories") echo "selected"; ?>>Accessories</option>
          </select>
        </div>
      </div>
    </form>

    <?php
      // Check if a category is selected
      if (isset($_GET['category']) && $_GET['category'] != "") {
        $selectedCategory = mysqli_real_escape_string($con, $_GET['category']);
        echo "<h3 class='mt-4'>$selectedCategory</h3><div class='row'>";

        $result = mysqli_query($con, "SELECT * FROM products WHERE category='$selectedCategory'");
        while ($row = mysqli_fetch_assoc($result)) {
          echo "
            <div class='col-md-3'>
              <div class='card mb-4'>
                <img src='uploads/{$row['image']}' class='card-img-top' height='200px'>
                <div class='card-body'>
                  <h5 class='card-title'>{$row['name']}</h5>
                  <p class='card-text'>{$row['description']}</p>
                  <p class='card-text'><b>{$row['category']}</b></p>
                </div>
              </div>
            </div>
          ";
        }

        echo "</div>"; // close row
      } else {
        // Show all categories if none selected
        $categories = mysqli_query($con, "SELECT DISTINCT category FROM products");

        while ($cat = mysqli_fetch_assoc($categories)) {
          echo "<h3 class='mt-4'>" . $cat['category'] . "</h3><div class='row'>";

          $result = mysqli_query($con, "SELECT * FROM products WHERE category='" . $cat['category'] . "'");
          while ($row = mysqli_fetch_assoc($result)) {
            echo "
              <div class='col-md-3'>
                <div class='card mb-4'>
                  <img src='uploads/{$row['image']}' class='card-img-top' height='200px'>
                  <div class='card-body'>
                    <h5 class='card-title'>{$row['name']}</h5>
                    <p class='card-text'>{$row['description']}</p>
                  <a href='../cart.php?id={$row['id']}'>Add to Cart</a>
                    <p class='card-text'><b>{$row['category']}</b></p>
                  </div>
                </div>
              </div>
            ";
          }

          echo "</div>"; 
        }
      }
    ?>
    <div class="mt-2">
         <?php include "footer.php";?> 
    </div>
  
  </div>
</body>
</html>

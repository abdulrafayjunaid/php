<?php
session_start();
include("connect.php");

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding items to cart
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    
    // Check if product exists
    $product_query = mysqli_query($con, "SELECT * FROM products WHERE id = $product_id");
    if (mysqli_num_rows($product_query) > 0) {
        $product = mysqli_fetch_assoc($product_query);
        
        // Check if product is already in cart
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1,
                'image' => $product['image']
            ];
        }
        
        header("Location: cart.php");
        exit();
    }
}

// Handle updating quantities
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $product_id => $quantity) {
        $product_id = intval($product_id);
        $quantity = intval($quantity);
        
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$product_id]);
        } else {
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        }
    }
}

// Handle saving to database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_to_db'])) {
    // Assuming customer ID is stored in session, otherwise use a default
    $customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : 1;
    
    foreach ($_SESSION['cart'] as $product_id => $item) {
        $quantity = $item['quantity'];
        $price = $item['price'];
        $total = $quantity * $price;
        
        // Insert into your 'inbox' table
        $sql = "INSERT INTO inbox (customer_id, product_id, quantity, price) 
                VALUES ('$customer_id', '$product_id', '$quantity', '$total')";
        
        mysqli_query($con, $sql);
    }
    
    // Clear cart after saving
    $_SESSION['cart'] = [];
    
    echo "<div class='alert alert-success'>Order saved successfully!</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Shopping Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .cart-container {
      max-width: 800px;
      margin: 0 auto;
    }
    .cart-item {
      border-bottom: 1px solid #eee;
      padding: 15px 0;
    }
    .quantity-input {
      width: 60px;
      text-align: center;
    }
    .btn-update {
      background: #ed9418;
      color: white;
      border: none;
    }
    .btn-update:hover {
      background: #d17a0c;
    }
    .btn-checkout {
      background: #28a745;
      color: white;
      padding: 10px 20px;
      font-size: 18px;
    }
  </style>
</head>
<body>
  <?php include "website/navbar.php"; ?>
  
  <div class="container mt-4">
    <h1 class="mb-4">Your Shopping Cart</h1>
    
    <?php if (empty($_SESSION['cart'])): ?>
      <div class="alert alert-info">Your cart is empty. <a href="home.php">Continue shopping</a></div>
    <?php else: ?>
      <form method="post" action="cart.php">
        <div class="cart-container">
          <?php 
          $total_amount = 0;
          foreach ($_SESSION['cart'] as $product_id => $item): 
            $item_total = $item['price'] * $item['quantity'];
            $total_amount += $item_total;
          ?>
            <div class="cart-item row">
              <div class="col-md-2">
                <img src="uploads/<?php echo $item['image']; ?>" class="img-fluid" alt="<?php echo $item['name']; ?>">
              </div>
              <div class="col-md-4">
                <h5><?php echo $item['name']; ?></h5>
                <p>Price: $<?php echo number_format($item['price'], 2); ?></p>
              </div>
              <div class="col-md-3">
                <label for="quantity_<?php echo $product_id; ?>">Quantity:</label>
                <input type="number" 
                       name="quantity[<?php echo $product_id; ?>]" 
                       id="quantity_<?php echo $product_id; ?>" 
                       value="<?php echo $item['quantity']; ?>" 
                       min="1" 
                       class="form-control quantity-input">
              </div>
              <div class="col-md-3">
                <p class="fw-bold">Total: $<?php echo number_format($item_total, 2); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
          
          <div class="row mt-4">
            <div class="col-md-6">
              <button type="submit" name="update_cart" class="btn btn-update">Update Cart</button>
              <a href="home.php" class="btn btn-secondary">Continue Shopping</a>
            </div>
            <div class="col-md-6 text-end">
              <h3>Total: $<?php echo number_format($total_amount, 2); ?></h3>
              <button type="submit" name="save_to_db" class="btn btn-checkout">Proceed to Checkout</button>
            </div>
          </div>
        </div>
      </form>
    <?php endif; ?>
  </div>
  
  <?php include "website/footer.php"; ?>
</body>
</html>
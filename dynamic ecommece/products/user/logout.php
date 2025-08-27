<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #2c3e50, #000000); /* black + dark grey gradient */
      color: #333;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
    .login-container {
      max-width: 420px;
      margin: 100px auto;
      padding: 30px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.25);
      transition: transform 0.3s ease-in-out;
    }
    .login-container:hover {
      transform: translateY(-5px);
    }
    .login-header h2 {
      font-weight: bold;
      color: #e74c3c; /* red */
    }
    .login-header p {
      color: #6c757d;
    }
    .form-label {
      font-weight: 500;
    }
    .form-control {
      border-radius: 8px;
      border: 1px solid #ccc;
    }
    .form-control:focus {
      border-color: #f39c12; /* orange */
      box-shadow: 0 0 0 0.25rem rgba(243, 156, 18, 0.25);
    }
    .btn-primary {
      background-color: #e74c3c; /* red */
      border: none;
      font-weight: bold;
      transition: background-color 0.3s;
    }
    .btn-primary:hover {
      background-color: #c0392b; /* darker red */
    }
    .form-check-label {
      font-size: 0.9rem;
    }
    .login-container a {
      color: #f39c12; /* orange */
      font-weight: 500;
    }
    .login-container a:hover {
      text-decoration: underline;
      color: #e67e22; /* darker orange */
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-container">
      <div class="login-header text-center">
        <h2>Login</h2>
        <p>Please enter your credentials</p>
      </div>
      
      <form method="post">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="remember">
          <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary" name="btn">Login</button>
        </div>
        <div class="mt-3 text-center">
          <a href="signup.php">No account? Signup</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <?php
  if(isset($_POST["btn"])){
    $email=$_POST["email"];
    $password=$_POST["password"];

    $sql="SELECT role FROM users WHERE email='$email' AND password='$password'";
    $run=mysqli_query($con,$sql);
    $fetch=mysqli_fetch_assoc($run);

    if($fetch && $fetch['role'] === "admin"){
      header('location:../products/dashboard.php');  
      exit();
    }elseif($fetch && $fetch["role"] === "user"){
      header('location:../website/index.html');
      exit();
    }else{
      echo"<script>alert('No user found');</script>";
      exit();
    }
  }
  ?>
</body>
</html>

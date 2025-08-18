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
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <h2>login</h2>
                <p class="text-muted">Please enter your credentials</p>
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
                    <a href="signup.php" class="text-decoration-none">no account signup</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    if(isset($_POST["btn"])){
      $email=$_POST["email"];
      $password=$_POST["password"];

    //   $sql="SELECT * FROM users where email ='$email' and password='$password'";
      $sql="SELECT role FROM users";
      $run=mysqli_query($con,$sql);
      $fetch=mysqli_fetch_assoc($run);

      if($fetch['role'] === "admin"){
        header('location:admin panel/index.php');  
        exit();
      }elseif($fetch["role"] === "user"){
        header('location:website/index.html');
        exit();
      }else{
        echo"<script>alert('no user found');</script>";
        exit();
      }
    }
    ?>
</body>
</html>
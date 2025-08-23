<?php
// session_start();
$user_id = $_SESSION['user_id'] ?? 0;
$role = $_SESSION['role'] ?? 'guest';
?>
<nav style="background:#2e7d32;padding:10px;color:white;">
    <a href="index.php">Home</a>
    <a href="plants.php">Plants</a>
    <a href="mygarden.php">My Garden</a>
    <a href="blogs.php">Blogs</a>
    <a href="cart.php">Cart</a>
    <?php if(isset($_SESSION['user_id'])): ?>
    <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
    <?php endif; ?>

    <?php if($role==='admin'){ ?>
        <a href="admin/index.php">Admin</a>
    <?php } ?>
    <?php if($user_id){ ?>
        <a href="logout.php" style="float:right;">Logout</a>
    <?php } else { ?>
        <a href="login.php" style="float:right;">Login</a>
        <a href="register.php" style="float:right;margin-right:10px;">Register</a>
    <?php } ?>
</nav>
        
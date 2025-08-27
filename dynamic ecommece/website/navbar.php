<nav>
  <div class="logo">🛍️ My Shop</div>
  <ul class="nav-links">
    <li><a href="home.php">Home</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="../logout.php" class="logout">Logout</a></li>
  </ul>
</nav>

<style>
  nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #222;
    padding: 15px 40px;
    border-radius: 12px;
  }

  .logo {
    font-size: 22px;
    font-weight: bold;
    color: #fff;
    letter-spacing: 1px;
  }

  .nav-links {
    list-style: none;
    display: flex;
    gap: 25px;
    margin: 0;
    padding: 0;
  }

  .nav-links li a {
    text-decoration: none;
    color: #ddd;
    font-size: 16px;
    transition: 0.3s ease;
  }

  .nav-links li a:hover {
    color: #ff9800;
  }

  .logout {
    background: #ff5722;
    padding: 8px 14px;
    border-radius: 8px;
    color: #fff !important;
    font-weight: bold;
    transition: 0.3s ease;
  }

  .logout:hover {
    background: #e64a19;
  }
</style>

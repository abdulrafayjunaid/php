<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <!-- /* Reset */ -->
  <style>
/* * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Body */
body {
  font-family: Arial, sans-serif;
  background: #fff;
  color: #333;
  /* line-height: 1.6; */
} 

/* Navbar */
/* .navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: black;
  padding: 15px 30px;
  position: sticky;
  top: 0;
  z-index: 1000;
}

.logo {
  color: orange;
  font-size: 32px;
  font-weight: bold;
}

.nav-links {
  list-style: none;
  display: flex;
}

.nav-links li {
  margin-left: 20px;
}

.nav-links a {
  text-decoration: none;
  color: white;
  font-weight: bold;
  transition: 0.3s;
}

.nav-links a:hover,
.nav-links .active {
  color: red;
} */

/* Content Wrapper */
.content {
  padding: 60px 20px;
  max-width: 900px;
  height: 500px;
  margin-bottom: 50px;
  margin: auto;
  text-align: center;
}

.content h1 {
  margin-bottom: 20px;
  color: black;
  font-size: 32px;
  border-bottom: 3px solid orange;
  display: inline-block;
  padding-bottom: 8px;
}

.content p {
  margin-bottom: 15px;
  font-size: 18px;
  color: #444;
}

/* Contact Form Styling (also used in contact.html) */
.contact-form {
  display: flex;
  flex-direction: column;
  gap: 15px;
  margin-top: 20px;
}

.contact-form input,
.contact-form textarea {
  padding: 12px;
  border: 1px solid grey;
  border-radius: 5px;
  font-size: 16px;
}

.contact-form button {
  padding: 12px;
  background: orange;
  color: white;
  border: none;
  cursor: pointer;
  font-weight: bold;
  border-radius: 5px;
  transition: 0.3s;
}

.contact-form button:hover {
  background: red;
}

/* Footer */
/* footer {
  text-align: center;
  padding: 20px;
  background: black;
  color: grey;
    margin-bottom: 10px;
    margin-top: 200px;
} */

/* Responsive Navbar */
/* @media (max-width: 768px) {
  .nav-links {
    flex-direction: column;
    background: black;
    position: absolute;
    top: 60px;
    right: 0;
    width: 180px;
    display: none;
  }

  .nav-links.show {
    display: block;
  }

  .nav-links li {
    margin: 15px 0;
  }
} */
</style>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Navbar -->
  <!-- <header>
    <nav class="navbar">
      <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <div class="logo">MyShop</div>
    </nav>
  </header> -->
  <?php include "navbar.php"; ?>

  <!-- About Section -->
  <main class="content">
    <h1>About Us</h1>
    <p>Welcome to <b>MyShop</b>, your number one source for quality products.</p>
    <p>We’re dedicated to giving you the very best of items with a focus on quality, customer service, and uniqueness.</p>
    <p>Founded in 2025, MyShop has come a long way from its beginnings. We hope you enjoy our products as much as we enjoy offering them to you.</p>
  </main>

  <!-- Footer -->
   <div class="mt-4">
       <?php include "footer.php"; ?>
   </div>

</body>
</html>

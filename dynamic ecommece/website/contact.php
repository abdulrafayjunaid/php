<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <style>
    body {
      margin: 10px;
      font-family: Arial, sans-serif;
      background: white;
      color: #333;
    }

    /* Navbar */
    /* .navbar {
      background: black;
      color: white;
      display: flex;
      height:60px;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
    }
    .navbar h1 {
      color: orange;
    }
    .navbar a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      font-weight: bold;
    }
    .navbar a:hover {
      color: red;
    } */

    /* Contact Section */
    .contact-container {
      max-width: 800px;
      margin: 50px auto;
      background: #f5f5f5;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
    }
    .contact-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: black;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 8px;
      color: grey;
    }
    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }
    .form-group textarea {
      resize: none;
      height: 120px;
    }
    .btn {
      background: orange;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }
    .btn:hover {
      background: red;
    }

    /* Footer */
    /* .footer {
      background: black;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    } */
  </style>
</head>
<body>

  <!-- Navbar -->
  <!-- <div class="navbar">
    <div>
      <a href="home.php">Home</a>
      <a href="about.php">about</a>
      <a href="contact.php">Contact</a>
    </div>
    <>MyShop<>
  </div> -->
  <?php include "navbar.php"; ?>

  <!-- Contact Form -->
  <div class="contact-container">
    <h2>Contact Us</h2>
    <form>
      <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" placeholder="Enter your name" required>
      </div>
      <div class="form-group">
        <label for="email">Your Email</label>
        <input type="email" id="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="message">Your Message</label>
        <textarea id="message" placeholder="Write your message..." required></textarea>
      </div>
      <button type="submit" class="btn">Send Message</button>
    </form>
  </div>

  <!-- Footer -->
  <?php include "footer.php"; ?>
</body>
</html>

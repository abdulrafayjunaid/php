<?php
include 'config.php';
// session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password =$_POST['password']; // ✅ HASH PASSWORD

    // Check if this is the first user
    $check = $conn->query("SELECT COUNT(*) as total FROM users");
    $row = $check->fetch_assoc();
    $role = ($row['total'] == 0) ? 'admin' : 'user'; // First user becomes admin

    $sql = "INSERT INTO users (username,email,password_hash,role) VALUES ('$username','$email','$password','$role')";
    if($conn->query($sql)){
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['role'] = $role;
        header("Location:index.php");
        exit;
    } else {
        echo "Error: ".$conn->error;
    }
}
?>

<?php include 'navbar.php'; ?>
<h2>Register</h2>
<form method="post">
    Username: <input type="text" name="username" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>
<?php include 'footer.php'; ?>

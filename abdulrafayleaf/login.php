<?php
include 'config.php';
session_start(); // MUST start session

if($_SERVER['REQUEST_METHOD']=="POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        // Plain text password check
        if($password === $user['password_hash']){ // here password_hash stores plain password
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if($user['role'] === 'admin'){
                header("Location: admin/index.php"); // Admin panel
            } else {
                header("Location: index.php"); // Regular user homepage
            }
            exit;
        } else {
            $error = "Wrong password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>

<?php include 'navbar.php'; ?>

<h2>Login</h2>

<?php
if(isset($error)) echo "<p style='color:red;'>$error</p>";
?>

<form method="post">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>

<?php include 'footer.php'; ?>

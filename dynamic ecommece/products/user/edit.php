<?php 
include "connect.php";

$id = $_GET['ID'];
$sql1 = "SELECT * FROM users WHERE ID='$id'";
$run1 = mysqli_query($con, $sql1);
$fetch1 = mysqli_fetch_assoc($run1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $fetch1['id']; ?>">

        <label>ID</label>
        <input type="number" value="<?php echo $fetch1['id']; ?>" disabled><br><br>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $fetch1['email']; ?>"><br><br>

        <label>Password</label>
        <input type="password" name="password" value="<?php echo $fetch1['password']; ?>"><br><br>

        <label>Role</label>
        <input type="text" name="role" value="<?php echo $fetch1['role']; ?>" disabled><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>

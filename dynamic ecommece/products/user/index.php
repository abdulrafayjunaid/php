<?php 
include "../connect.php";

$sql1 = "SELECT * FROM users";
$run1 = mysqli_query($con, $sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        while ($fetch1 = mysqli_fetch_assoc($run1)) {
            echo "
            <tr>
                <td>{$fetch1['id']}</td>
                <td>{$fetch1['email']}</td>
                <td>{$fetch1['password']}</td>
                <td>{$fetch1['role']}</td>
                <td>
                    <a href='edit.php?ID={$fetch1['id']}'>Edit</a> | 
                    <a href='delete.php?ID={$fetch1['id']}'>Delete</a>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>

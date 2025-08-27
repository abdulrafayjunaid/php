<?php 
include "connect.php";

$sql1 = "SELECT * FROM users";
$run1 = mysqli_query($con, $sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
        /* Reset */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            height: 100vh;
            background: #2c3e50;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        /* Content */
        .content {
            margin-left: 220px;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        table th, table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background: #2c3e50;
            color: white;
        }

        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        /* Action Links */
        td a {
            padding: 6px 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        td a:first-child {
            background: #f39c12;
            color: white;
        }

        td a:last-child {
            background: #e74c3c;
            color: white;
        }

        td a:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="../dashboard.php">Dashboard</a>
        <a href="user-home.php">Users</a>
        <!-- <a href="products.php">Products</a> -->
        <a href="settings.php">Settings</a>
        <a href="../../logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Users</h1>
        <table cellpadding="8" cellspacing="0">
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
                        <a href='edit.php?ID={$fetch1['id']}'>Edit</a> 
                        <a href='delete.php?ID={$fetch1['id']}'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

</body>
</html>

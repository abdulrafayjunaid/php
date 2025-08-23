<?php
include '../config.php';
session_start();
if($_SESSION['role']!='admin') die("Access denied");

$result=$conn->query("SELECT o.order_id,u.username,o.order_date,o.total_amount,o.status
                      FROM orders o JOIN users u ON o.user_id=u.user_id");
?>
<h2>Manage Orders</h2>
<table border="1">
<tr><th>ID</th><th>User</th><th>Date</th><th>Total</th><th>Status</th></tr>
<?php while($row=$result->fetch_assoc()){ ?>
<tr>
    <td><?php echo $row['order_id'];?></td>
    <td><?php echo $row['username'];?></td>
    <td><?php echo $row['order_date'];?></td>
    <td><?php echo $row['total_amount'];?></td>
    <td><?php echo $row['status'];?></td>
</tr>
<?php } ?>
</table>

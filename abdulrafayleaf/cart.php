<?php
include 'config.php';
session_start();

if(!isset($_SESSION['user_id'])){
    die("Please login to access the cart");
}

$user_id = $_SESSION['user_id'];

// Handle add to cart
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['plant_id'])){
    $plant_id = $_POST['plant_id'];
    $quantity = $_POST['quantity'];

    $check = $conn->query("SELECT * FROM cart WHERE user_id='$user_id' AND plant_id='$plant_id'");
    if($check->num_rows > 0){
        $conn->query("UPDATE cart SET quantity = quantity + $quantity WHERE user_id='$user_id' AND plant_id='$plant_id'");
    } else {
        $conn->query("INSERT INTO cart(user_id, plant_id, quantity) VALUES('$user_id','$plant_id','$quantity')");
    }
    header("Location: cart.php");
    exit;
}

// Handle remove from cart
if(isset($_GET['remove'])){
    $cart_id = $_GET['remove'];
    $conn->query("DELETE FROM cart WHERE cart_id='$cart_id' AND user_id='$user_id'");
    header("Location: cart.php");
    exit;
}

include 'navbar.php';
?>

<h2>Your Cart</h2>
<?php
$result = $conn->query("
    SELECT c.cart_id, c.quantity, p.name, p.price, p.image, p.plant_id 
    FROM cart c
    JOIN plants p ON c.plant_id=p.plant_id
    WHERE c.user_id='$user_id'
");

if($result->num_rows > 0){
    echo '<table border="1" cellpadding="10">
            <tr><th>Plant</th><th>Image</th><th>Price</th><th>Quantity</th><th>Action</th></tr>';
    $total = 0;
    while($row=$result->fetch_assoc()){
        $subtotal = $row['price'] * $row['quantity'];
        $total += $subtotal;
        echo '<tr>
                <td>'.$row['name'].'</td>
                <td><img src="'.$row['image'].'" width="80"></td>
                <td>$'.$row['price'].'</td>
                <td>'.$row['quantity'].'</td>
                <td>
                    <a href="cart.php?remove='.$row['cart_id'].'">Remove</a> |
                    <a href="mygarden.php?add='.$row['plant_id'].'">Add to My Garden</a>
                </td>
              </tr>';
    }
    echo '<tr><td colspan="5">Total: $'.$total.'</td></tr>';
    echo '</table>';
} else {
    echo "<p>Your cart is empty.</p>";
}
?>

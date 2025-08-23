<?php
include 'config.php';
session_start();

if(!isset($_SESSION['user_id'])){
    die("Please login to access My Garden");
}

$user_id = $_SESSION['user_id'];

// Add plant to My Garden (from cart or direct)
if(isset($_GET['add'])){
    $plant_id = $_GET['add'];

    // Check if plant already in My Garden
    $check = $conn->query("SELECT * FROM mygarden WHERE user_id='$user_id' AND plant_id='$plant_id'");
    if($check->num_rows == 0){
        $conn->query("INSERT INTO mygarden(user_id, plant_id) VALUES('$user_id', '$plant_id')");
        echo "<p>Plant added to your garden!</p>";
    }
}

// Remove plant from My Garden
if(isset($_GET['remove'])){
    $garden_id = $_GET['remove'];
    $conn->query("DELETE FROM mygarden WHERE garden_id='$garden_id' AND user_id='$user_id'");
}

include 'navbar.php';
?>

<h2>My Garden</h2>

<?php
$result = $conn->query("
    SELECT g.garden_id, p.name, p.image, p.care_level, p.light_requirement, p.watering_schedule
    FROM mygarden g
    JOIN plants p ON g.plant_id=p.plant_id
    WHERE g.user_id='$user_id'
");

if($result->num_rows > 0){
    echo '<table border="1" cellpadding="10">
            <tr><th>Plant</th><th>Image</th><th>Care Level</th><th>Light</th><th>Watering</th><th>Action</th></tr>';
    while($row=$result->fetch_assoc()){
        echo '<tr>
                <td>'.$row['name'].'</td>
                <td><img src="'.$row['image'].'" width="80"></td>
                <td>'.$row['care_level'].'</td>
                <td>'.$row['light_requirement'].'</td>
                <td>'.$row['watering_schedule'].'</td>
                <td><a href="mygarden.php?remove='.$row['garden_id'].'">Remove</a></td>
              </tr>';
    }
    echo '</table>';
} else {
    echo "<p>Your garden is empty.</p>";
}
?>

<?php include 'navbar.php'; ?>
<h2>Plant Catalog</h2>
<?php
include 'config.php';
$result = $conn->query("SELECT * FROM plants");
echo '<div style="display:flex;flex-wrap:wrap;">';
while($plant=$result->fetch_assoc()){
    echo '<div class="card" style="width:200px;">
            <img src="'.$plant['image'].'" width="180"><br>
            <strong>'.$plant['name'].'</strong><br>
            $'.$plant['price'].'<br>
            <a href="mygarden.php?add='.$plant['plant_id'].'">Add to My Garden</a>
          </div>';
}
echo '</div>';
?>
<?php include 'footer.php'; ?>

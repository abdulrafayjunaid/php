<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        /* General body styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }

        /* Centered hero section */
        .hero {
            text-align: center;
            margin: 50px 20px 30px 20px;
        }

        .hero h1 {
            font-size: 2.5rem;
            color: #2e7d32;
        }

        .hero p {
            font-size: 1.2rem;
            margin: 10px 0 20px 0;
        }

        .hero .button {
            display: inline-block;
            padding: 10px 20px;
            background: #2e7d32;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .hero .button:hover {
            background: #1b5e20;
        }

        /* Featured Plants Section */
        .featured {
            margin: 50px 20px;
        }

        .featured h2 {
            font-size: 2rem;
            color: #2e7d32;
            margin-bottom: 20px;
        }

        .plants-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            width: 200px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .card strong {
            display: block;
            margin: 10px 0 5px 0;
            font-size: 1.1rem;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            background: #2e7d32;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .card a:hover {
            background: #1b5e20;
        }

        /* Responsive */
        @media screen and (max-width: 600px) {
            .hero h1 {
                font-size: 2rem;
            }
            .hero p {
                font-size: 1rem;
            }
            .plants-container {
                flex-direction: column;
                align-items: center;
            }
            .card {
                width: 90%;
            }
        }
    </style>
<body>
    <div style="text-align:center;margin-top:50px;">
    <h1>Welcome to Greenleaf</h1>
    <p>Your online plant and gardening companion!</p>
    <a href="plants.php" class="button">Browse Plants</a>
</div>

<div style="margin:50px;">
    <h2>Featured Plants</h2>
    <?php
    include 'config.php';
    $result = $conn->query("SELECT * FROM plants LIMIT 4");
    echo '<div style="display:flex;gap:20px;">';
    while($plant=$result->fetch_assoc()){
        echo '<div class="card" style="width:200px;">
                <img src="'.$plant['image'].'" width="180"><br>
                <strong>'.$plant['name'].'</strong><br>
                $'.$plant['price'].'<br>
                <a href="plants.php">View</a>
              </div>';
    }
    echo '</div>';
    ?>
</div>
</body>
</html>

<?php include 'footer.php'; ?>

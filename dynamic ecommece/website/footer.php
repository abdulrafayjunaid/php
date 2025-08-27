<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Footer</title>
    <style>
        footer {
            background: #222;
            /* background: ; Gradient background */
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 14px;
            /* position: fixed; Stays at bottom */
            bottom: 0;
            left: 0;
            width: 100%;
            box-shadow: 0 -3px 6px rgba(0,0,0,0.3); /* Soft shadow above */
        }

        footer b {
            letter-spacing: 1px;
            font-weight: normal;
        }

        footer span {
            color: #ffdd57; /* Highlighted color */
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- <div style="min-height:100vh; padding-bottom:60px;"> -->
        <!-- Your website content goes here -->
    </div>

    <footer>
        <b>Copyright © <span>2024 - 2025</span> My Shop</b>
    </footer>

</body>
</html>

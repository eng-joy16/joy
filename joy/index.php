<?php
include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENTAL</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        <?php
       
        echo "
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background: #000;
            color: white;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: #111;
        }
        .header .logo {
            font-size: 24px;
            font-weight: bold;
        }
        .header nav ul {
            list-style: none;
            display: flex;
        }
        .header nav ul li {
            margin: 0 15px;
        }
        .header nav ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
        }
        .header nav ul li .btn {
            border: 2px solid #ff6600;
            padding: 8px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .header nav ul li .btn:hover {
            background: #ff6600;
            color: #000;
        }
        .hero {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            background: url('car.jpg.jpg') no-repeat center center/cover;
        }
        .hero-content {
            background: rgba(0, 0, 0, 0.8);
            padding: 40px;
            border-radius: 10px;
            text-align: center;
        }
        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 10px;
        }
        .hero-content p {
            margin-bottom: 20px;
        }
        .search-box {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .search-box input {
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 300px;
        }
        .search-box button {
            padding: 10px 20px;
            background: #ff6600;
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }
        .search-box button:hover {
            background: #ff4500;
        }
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }
            .header nav ul {
                flex-direction: column;
                gap: 10px;
            }
            .search-box {
                flex-direction: column;
            }
            .search-box input {
                width: 100%;
            }
        }
        ";
        ?>
    </style>
</head>
<body>
    <header class="header">
        <div class="logo"><a href="#" style="color:white; text-decoration:none;">RENT</a></div>
        <nav>
            <ul>
                <li><a href="services.php">Services</a></li>
                <li><a href="rent.php">Rent</a></li>

                <li><a href="login.php" class="btn">Login</a></li>
                <li><a href="register.php" class="btn">Sign Up</a></li>
            </ul>
        </nav>
    </header>
    
    <section class="hero">
        <div class="hero-content">
            <h1>RENTAL</h1>
            <p> Rental  Always With You.</p>
            <form class="search-box" action="search.php" method="get">
                <input type="text" name="location" placeholder="Search for location">
                <button type="submit">Search</button>
            </form>
            <img src="
        </div>
    </section>
</body>
</html>
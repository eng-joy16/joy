<?php
include 'db.php';
session_start();

// Set timezone and get current date
date_default_timezone_set('Asia/Dhaka');
$currentDate = date("F j, Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Services</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background-color: #000;
            color: white;
        }

        .header {
            background: #111;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0 15px;
            position: relative;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            display: block;
        }

        .btn {
            border: 2px solid #ff6600;
            padding: 8px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #ff6600;
            color: #000;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #111;
            min-width: 180px;
            z-index: 1000;
            top: 40px;
            left: 0;
            border-radius: 5px;
            padding: 0;
        }

        .dropdown-content li {
            list-style: none;
            border-bottom: 1px solid #333;
        }

        .dropdown-content li a {
            color: white;
            padding: 10px 15px;
            display: block;
            text-decoration: none;
        }

        .dropdown-content li a:hover {
            background-color: #ff6600;
            color: black;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .container {
            padding: 50px 20px;
            max-width: 1100px;
            margin: auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .service-box {
            background: #111;
            padding: 30px;
            border-radius: 12px;
            transition: 0.3s;
            border: 1px solid #333;
            text-align: center;
            cursor: pointer;
        }

        .service-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 10px #ff6600;
        }

        .icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .title {
            font-size: 20px;
            margin-bottom: 10px;
            color: #ff6600;
        }

        .desc {
            color: #ccc;
            font-size: 15px;
        }

        .desc strong {
            color: #ff6600;
        }

        /* ✅ Confirmation Message Style */
        .confirmation {
            background: linear-gradient(45deg, #28a745, #218838);
            padding: 15px 20px;
            color: white;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(40,167,69,0.3);
        }

        .confirmation::before {
            content: "✔️ ";
            font-size: 20px;
            margin-right: 8px;
        }

        /* ✅ Error Message Style (optional) */
        .error-message {
            background: linear-gradient(45deg, #dc3545, #c82333);
            padding: 15px 20px;
            color: white;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(220,53,69,0.3);
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }
            nav ul {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

<!-- ✅ Navigation Bar -->
<header class="header">
    <div class="logo"><a href="index.php" style="color:white; text-decoration:none;">RENT</a></div>
    <nav>
        <ul>
            <li class="dropdown">
                <a href="#" class="btn">Services</a>
                <ul class="dropdown-content">
                    <li><a href="service_car_rentals.php">Our Service</a></li>
                    <li><a href="service_cleaning.php">Cleaning</a></li>
                    <li><a href="service_maintenance.php">Maintenance</a></li>
                </ul>
            </li>
            <li><a href="rent.php">Rent</a></li>
            <li><a href="login.php" class="btn">Login</a></li>
            <li><a href="register.php" class="btn">Sign Up</a></li>
        </ul>
    </nav>
</header>

<!-- ✅ Service Section -->
<div class="container">
    <h1 style="text-align:center; margin-bottom: 40px; color: #ff6600;">Our Services</h1>

    <!-- ✅ Success Message -->
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 1 && isset($_GET['service'])) {
        echo "<div class='confirmation'>Your " . htmlspecialchars($_GET['service']) . " service has been confirmed successfully!</div>";
    }

    // Optional error message
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo "<div class='error-message'>Something went wrong. Please try again.</div>";
    }
    ?>

    <div class="services-grid">

        <!-- Our Service -->
        <a href="service_car_rentals.php" style="text-decoration:none;">
            <div class="service-box">
                <div class="icon">🚗</div>
                <div class="title">Our Service</div>
                <div class="desc">Book vehicles quickly and easily with our premium rental service.</div>
                <div class="desc" style="margin-top: 15px; font-size: 14px; color: #999;">
                    Available Today: <strong><?php echo $currentDate; ?></strong>
                </div>
            </div>
        </a>

        <!-- Cleaning -->
        <a href="service_cleaning.php" style="text-decoration:none;">
            <div class="service-box">
                <div class="icon">🧹</div>
                <div class="title">Cleaning</div>
                <div class="desc">Get your car washed and cleaned by our expert cleaners.</div>
                <div class="desc" style="margin-top: 15px; font-size: 14px; color: #999;">
                    Available Today: <strong><?php echo $currentDate; ?></strong>
                </div>
            </div>
        </a>

        <!-- Maintenance -->
        <a href="service_maintenance.php" style="text-decoration:none;">
            <div class="service-box">
                <div class="icon">🔧</div>
                <div class="title">Maintenance</div>
                <div class="desc">Fix issues and maintain your car with our technicians.</div>
                <div class="desc" style="margin-top: 15px; font-size: 14px; color: #999;">
                    Available Today: <strong><?php echo $currentDate; ?></strong>
                </div>
            </div>
        </a>

    </div>
</div>

</body>
</html>

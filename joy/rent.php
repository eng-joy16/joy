<?php
include 'db.php';
session_start();

// Check if the user is an admin
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available NOW</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background: #000; color: white; }

        .header {
            display: flex; justify-content: space-between; align-items: center;
            padding: 20px; background: #111;
        }

        .header .logo {
            font-size: 24px; font-weight: bold;
        }

        .header nav ul {
            list-style: none; display: flex;
        }

        .header nav ul li {
            margin: 0 15px;
        }

        .header nav ul li a {
            color: white; text-decoration: none; padding: 8px 15px;
        }

        .header nav ul li .btn {
            border: 2px solid #ff6600; padding: 8px 15px;
            border-radius: 5px; transition: 0.3s;
        }

        .header nav ul li .btn:hover {
            background: #ff6600; color: #000;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }

        .top-bar {
            display: flex; justify-content: space-between;
            align-items: center; margin-bottom: 30px;
        }

        .top-bar a {
            background: #ff6600;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .car-box {
            background: #111;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            gap: 20px;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 8px rgba(0,0,0,0.5);
        }

        .car-box img {
            width: 200px;
            height: 120px;
            border-radius: 10px;
            object-fit: cover;
        }

        .car-info {
            flex: 1;
            padding: 0 10px;
        }

        .car-info h3 { margin-bottom: 10px; }
        .car-info p { margin: 5px 0; }

        .rent-btn {
            background: linear-gradient(45deg, #ff6600, #ff8533);
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(255, 102, 0, 0.4);
        }

        .rent-btn:hover {
            background: linear-gradient(45deg, #ff4500, #ff6600);
        }

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
            position: relative;
        }

        .confirmation::before {
            content: "✔️ ";
            font-size: 20px;
            margin-right: 8px;
        }
    </style>
</head>
<body>

<!-- ✅ Navigation Bar -->
<header class="header">
    <div class="logo"><a href="index.php" style="color:white; text-decoration:none;">RENT</a></div>
    <nav>
        <ul>
            <li><a href="rent.php">Services</a></li>
            <li><a href="rent.php">Rent</a></li>
            <?php if ($isAdmin): ?>
                <li><a href="admin_panel.php" class="btn">Admin</a></li>
            <?php endif; ?>
            <li><a href="login.php" class="btn">Login</a></li>
            <li><a href="register.php" class="btn">Sign Up</a></li>
        </ul>
    </nav>
</header>

<!-- ✅ Main Content -->
<div class="container">
    <div class="top-bar">
        <h2>Available NOW</h2>
        <?php if ($isAdmin): ?>
            <a href="add_car.php">+ Add New Ad</a>
        <?php endif; ?>
    </div>

    <?php
    if (isset($_GET['success']) && $_GET['success'] == '1') {
        echo "<div class='confirmation'>Your service has been confirmed successfully!</div>";
    }

    $result = mysqli_query($conn, "SELECT * FROM cars ORDER BY id DESC");
    while ($car = mysqli_fetch_assoc($result)) {
        echo '
        <div class="car-box">
            <img src="uploads/' . htmlspecialchars($car['image']) . '" alt="Car">
            <div class="car-info">
                <h3>' . htmlspecialchars($car['model']) . '</h3>
                <p><strong>Location:</strong> ' . htmlspecialchars($car['location']) . '</p>
                <p><strong>Price/Day:</strong> ৳' . htmlspecialchars($car['price']) . '</p>
            </div>
            <form action="confirm_rent.php" method="POST">
                <input type="hidden" name="car_id" value="' . $car['id'] . '">
                <button type="submit" class="rent-btn">Confirm Rent</button>
            </form>
        </div>';
    }
    ?>
</div>

</body>
</html>

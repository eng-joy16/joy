<?php
session_start();
// Show "Admin" button only if the user is logged in and is an admin
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>

<style>
    .header {
        background: #111;
        padding: 20px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-family: 'Segoe UI', sans-serif;
    }

    .logo a {
        color: #fff;
        font-size: 28px;
        font-weight: bold;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1px;
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
        color: #fff;
        text-decoration: none;
        padding: 10px 15px;
        font-weight: 500;
        transition: background 0.3s, color 0.3s;
        text-transform: capitalize;
    }

    nav ul li a:hover {
        background: #ff6600;
        color: #000;
        border-radius: 5px;
    }

    .btn {
        border: 2px solid #ff6600;
        border-radius: 5px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #111;
        border: 1px solid #333;
        border-radius: 5px;
        top: 45px;
        left: 0;
        min-width: 180px;
        z-index: 1000;
    }

    .dropdown-content li {
        border-bottom: 1px solid #222;
    }

    .dropdown-content li:last-child {
        border-bottom: none;
    }

    .dropdown-content li a {
        display: block;
        padding: 10px 15px;
        color: #fff;
        text-decoration: none;
    }

    .dropdown-content li a:hover {
        background-color: #ff6600;
        color: #000;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    @media (max-width: 768px) {
        .header {
            flex-direction: column;
            text-align: center;
        }

        nav ul {
            flex-direction: column;
        }

        nav ul li {
            margin: 10px 0;
        }

        .dropdown-content {
            position: static;
        }
    }
</style>

<!-- ✅ Navigation Header -->
<header class="header">
    <div class="logo">
        <a href="index.php">RENT</a>
    </div>
    <nav>
        <ul>
            <li class="dropdown">
                <a href="#" class="btn">Services</a>
                <ul class="dropdown-content">
                    <li><a href="service_car_rentals.php">Car Rental</a></li>
                    <li><a href="service_cleaning.php">Cleaning</a></li>
                    <li><a href="service_maintenance.php">Maintenance</a></li>
                </ul>
            </li>
            <li><a href="rent.php">Rent</a></li>

            <?php if ($isAdmin): ?>
                <li><a href="admin_panel.php" class="btn">Admin</a></li>
            <?php endif; ?>

            <li><a href="login.php" class="btn">Login</a></li>
            <li><a href="register.php" class="btn">Sign Up</a></li>
        </ul>
    </nav>
</header>

<?php
// admin_panel.php
include 'db.php';
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <style>
        body {
            background-color: #000;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background: #111;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            color: #ff6600;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }

        .card {
            background-color: #111;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px #ff6600;
        }

        a.logout {
            color: #ff6600;
            text-decoration: none;
            font-weight: bold;
            float: right;
            margin-top: -40px;
            margin-right: 20px;
        }

        a.logout:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
        <a href="admin_logout.php" class="logout">Logout</a>
    </div>

    <div class="container">
        <div class="card">
            <h2>Manage Car Listings</h2>
            <p><a href="add_car.php" style="color:#ff6600;">+ Add New Car</a></p>
            <p><a href="manage_cars.php" style="color:#ff6600;">View / Edit Cars</a></p>
        </div>

        <div class="card">
            <h2>View Rental Requests</h2>
            <p><a href="rental_requests.php" style="color:#ff6600;">See Requests</a></p>
        </div>

        <div class="card">
            <h2>Manage Users</h2>
            <p><a href="users.php" style="color:#ff6600;">User List</a></p>
        </div>
    </div>
</body>
</html>

<?php
include 'db.php';
session_start();
date_default_timezone_set('Asia/Dhaka');
$currentDate = date("Y-m-d");
$displayDate = date("F j, Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Your Service</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            background-color: #0a0a0a;
            color: #fff;
        }

        .header {
            background-color: #1a1a1a;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.5);
        }

        .logo a {
            color: #ff6600;
            font-size: 28px;
            font-weight: bold;
            text-decoration: none;
            text-transform: uppercase;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        nav ul li a:hover,
        nav ul li a.active {
            background-color: #ff6600;
            color: #000;
        }

        .btn {
            border: 2px solid #ff6600;
        }

        .container {
            max-width: 600px;
            margin: 80px auto;
            padding: 30px;
            background: #1a1a1a;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 102, 0, 0.4);
        }

        .container h2 {
            text-align: center;
            color: #ff6600;
            margin-bottom: 30px;
        }

        form select,
        form input[type="text"],
        form input[type="date"],
        form button {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: none;
            font-size: 16px;
            background-color: #2a2a2a;
            color: #fff;
            border: 1px solid #444;
        }

        form button {
            background-color: #ff6600;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #e65c00;
        }

        .note {
            font-size: 14px;
            color: #bbb;
            text-align: center;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
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

            .container {
                margin: 40px 20px;
                padding: 20px;
            }
        }
    </style>
    <script>
        function toggleFormFields() {
            const serviceType = document.getElementById("serviceType").value;
            const carTypeField = document.getElementById("carTypeField");
            const locationField = document.getElementById("locationField");
            const dateField = document.getElementById("dateField");
            const note = document.getElementById("availableNote");
            const submitBtn = document.getElementById("submitBtn");

            if (serviceType === "Car Rental") {
                carTypeField.style.display = "block";
                locationField.style.display = "block";
                dateField.style.display = "block";
                note.style.display = "block";
                submitBtn.style.display = "block";
            } else if (serviceType === "Cleaning" || serviceType === "Maintenance") {
                carTypeField.style.display = "none";
                locationField.style.display = "block";
                dateField.style.display = "block";
                note.style.display = "block";
                submitBtn.style.display = "block";
            } else {
                // Reset if no option selected
                carTypeField.style.display = "none";
                locationField.style.display = "none";
                dateField.style.display = "none";
                note.style.display = "none";
                submitBtn.style.display = "none";
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            toggleFormFields();
        });
    </script>
</head>
<body>

<!-- Navigation Bar -->
<header class="header">
    <div class="logo"><a href="index.php">RENT</a></div>
    <nav>
        <ul>
            <li><a href="services.php" class="btn">Services</a></li>
            <li><a href="rent.php">Rent</a></li>
            <li><a href="login.php" class="btn">Login</a></li>
            <li><a href="register.php" class="btn">Sign Up</a></li>
        </ul>
    </nav>
</header>

<!-- Service Form -->
<div class="container">
    <h2>Confirm Your Service</h2>
    <form action="confirm_service.php" method="POST">
        <select name="service_type" id="serviceType" onchange="toggleFormFields()" required>
            <option value="">Select Service Type</option>
            <option value="Car Rental">Car Rental</option>
            <option value="Cleaning">Cleaning</option>
            <option value="Maintenance">Maintenance</option>
        </select>

        <div id="carTypeField" style="display: none;">
            <input type="text" name="car_type" placeholder="Car Type (e.g. Sedan, SUV)">
        </div>

        <div id="locationField" style="display: none;">
            <input type="text" name="location" placeholder="Service Location">
        </div>

        <div id="dateField" style="display: none;">
            <input type="date" name="service_date" value="<?php echo $currentDate; ?>">
        </div>

        <p id="availableNote" class="note" style="display: none;">Available Today: <?php echo $displayDate; ?></p>

        <button id="submitBtn" type="submit" style="display: none;">Confirm Booking</button>
    </form>
</div>

</body>
</html>

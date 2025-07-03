<?php
// service_cleaning.php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Cleaning Service</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #fdfbfb, #ebedee); /* Light gradient */
            color: #333;
        }

        .content {
            max-width: 650px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #ff6600;
            margin-bottom: 25px;
        }

        form input, form button {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        form input:focus {
            border-color: #ff6600;
            box-shadow: 0 0 8px rgba(255, 102, 0, 0.3);
            outline: none;
        }

        form button {
            background-color: #ff6600;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        form button:hover {
            background-color: #e65c00;
            transform: translateY(-2px);
        }

        .note {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        .success {
            background-color: #28a745;
            color: white;
            padding: 12px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<div class='success'>✅ Your cleaning request is confirmed! Proceed to payment.</div>";
}
?>

<div class="content">
    <h1>Car Cleaning Service</h1>
    <p class="note">Schedule your car cleaning service today!</p>
    <form method="POST" action="cleaning_confirm.php">
        <input type="text" name="car_type" placeholder="Car Type (e.g., Sedan, SUV)" required>
        <input type="text" name="location" placeholder="Cleaning Location" required>
        <input type="date" name="date" required>
        <button type="submit">Confirm Cleaning</button>
    </form>
</div>

</body>
</html>

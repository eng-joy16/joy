<?php
// service_maintenance.php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Maintenance</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f0f4f7, #d9e4f5);  /* Light blueish background */
            color: #333;
        }

        .content {
            max-width: 700px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007BFF;   /* Blue accent */
            margin-bottom: 25px;
        }

        form input, form textarea, form button {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        form textarea {
            resize: vertical;
            min-height: 80px;
        }

        form input:focus, form textarea:focus {
            border-color: #007BFF;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        form button {
            background-color: #007BFF;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        form button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .note {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: -10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="content">
    <h1>Vehicle Maintenance</h1>
    <p class="note">Schedule your maintenance service below:</p>
    <form method="POST" action="maintenance_confirm.php">
        <input type="text" name="car_model" placeholder="Car Model (e.g., Toyota Corolla)" required>
        <textarea name="issue" placeholder="Describe the issue (e.g., engine noise, brake problem)" required></textarea>
        <input type="date" name="date" required>
        <button type="submit">Confirm Maintenance</button>
    </form>
</div>

</body>
</html>

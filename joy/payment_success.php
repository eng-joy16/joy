<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Successful</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #d4edda, #ffffff);
            color: #155724;
        }

        .success-container {
            max-width: 600px;
            margin: 100px auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #28a745;
            margin-bottom: 25px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="success-container">
    <h1>✅ Payment Successful!</h1>
    <p>Thank you for your payment. Your maintenance booking is now confirmed.</p>
    <a href="index.php">Go to Home</a>
</div>

</body>
</html>

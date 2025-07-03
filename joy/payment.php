<?php
session_start();

if (isset($_POST['pay'])) {
    // Normally here you would process actual payment.
    // For now, we simulate success by redirecting to the success page.
    header("Location: payment_success.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Payment</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #ffffff);
            color: #333;
        }

        .payment-container {
            max-width: 600px;
            margin: 80px auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #007BFF;
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
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="payment-container">
    <h1>Service Payment</h1>
    <p>Please enter your payment details to complete the booking.</p>

    <form method="POST" action="">
        <input type="text" name="card_number" placeholder="Card Number (e.g., 1234 5678 9012 3456)" required>
        <input type="text" name="card_name" placeholder="Name on Card" required>
        <input type="text" name="expiry" placeholder="Expiry Date (MM/YY)" required>
        <input type="text" name="cvv" placeholder="CVV" required>
        <button type="submit" name="pay">Make Payment</button>
    </form>
</div>

</body>
</html>

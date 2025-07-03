<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['car_id'])) {
    $car_id = $_POST['car_id'];
    $user = $_SESSION['username'] ?? 'Guest';

    

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Rent Confirmation</title>
        <style>
            body {
                background: #0f0f0f;
                color: #fff;
                font-family: Arial, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .confirmation-box {
                background: linear-gradient(135deg, #1db954, #1ed760);
                padding: 40px 60px;
                border-radius: 15px;
                text-align: center;
                box-shadow: 0 12px 30px rgba(0, 255, 100, 0.3);
                animation: fadeIn 0.8s ease;
                max-width: 500px;
                width: 90%;
            }

            .confirmation-box .check-icon {
                font-size: 60px;
                margin-bottom: 20px;
                animation: bounce 1s ease;
            }

            .confirmation-box h1 {
                font-size: 32px;
                margin-bottom: 10px;
                color: #fff;
            }

            .confirmation-box p {
                font-size: 18px;
                margin-bottom: 25px;
                color: #f0f0f0;
            }

            .confirmation-box a, .confirmation-box button {
                display: inline-block;
                padding: 12px 25px;
                margin: 5px;
                border: none;
                border-radius: 6px;
                font-weight: bold;
                text-decoration: none;
                transition: 0.3s;
                cursor: pointer;
            }

            .confirmation-box .payment-btn {
                background: #ffffff;
                color: #1db954;
            }

            .confirmation-box .payment-btn:hover {
                background: #e0e0e0;
            }

            .confirmation-box .back-btn {
                background: transparent;
                color: #fff;
                border: 2px solid #fff;
            }

            .confirmation-box .back-btn:hover {
                background: #fff;
                color: #1db954;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            @keyframes bounce {
                0% { transform: scale(0.8); opacity: 0; }
                60% { transform: scale(1.1); opacity: 1; }
                100% { transform: scale(1); }
            }
        </style>
    </head>
    <body>

    <div class="confirmation-box">
        <div class="check-icon">✅</div>
        <h1>Rent Confirmed!</h1>
        <p>Thank you <strong><?php echo htmlspecialchars($user); ?></strong>, your rent request for Car ID <strong><?php echo htmlspecialchars($car_id); ?></strong> has been successfully confirmed.</p>

        <form action="payment.php" method="POST" style="display:inline;">
            <input type="hidden" name="car_id" value="<?php echo htmlspecialchars($car_id); ?>">
            <button type="submit" class="payment-btn">💳 Proceed to Payment</button>
        </form>

        <a href="rent.php" class="back-btn">← Back to Cars</a>
    </div>

    </body>
    </html>
    <?php
    exit();
} else {
    header("Location: rent.php");
    exit();
}
?>

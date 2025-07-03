<?php
// cleaning_confirm.php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_type = $_POST['car_type'];
    $location = $_POST['location'];
    $date = $_POST['date'];

    // Prepare SQL insert
    $stmt = $conn->prepare("INSERT INTO cleaning_requests (car_type, location, cleaning_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $car_type, $location, $date);

    if ($stmt->execute()) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Cleaning Service Confirmation</title>
            <style>
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
                    padding: 40px;
                    text-align: center;
                    color: #333;
                }

                .confirmation-box {
                    max-width: 600px;
                    margin: 50px auto;
                    background: #ffffff;
                    padding: 30px;
                    border-radius: 12px;
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
                }

                h2 {
                    color: #28a745;
                    margin-bottom: 15px;
                }

                .details {
                    text-align: left;
                    margin-top: 20px;
                    padding: 10px;
                    border-top: 1px solid #ddd;
                    font-size: 16px;
                    line-height: 1.6;
                }

                .details p {
                    margin: 8px 0;
                }

                .payment-button {
                    display: inline-block;
                    margin-top: 30px;
                    padding: 12px 30px;
                    background-color: #FF6600;
                    color: white;
                    text-decoration: none;
                    border-radius: 6px;
                    font-weight: bold;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 12px rgba(255, 102, 0, 0.3);
                }

                .payment-button:hover {
                    background-color: #e65c00;
                    transform: translateY(-2px);
                    box-shadow: 0 6px 16px rgba(255, 102, 0, 0.4);
                }
            </style>
        </head>
        <body>

        <div class="confirmation-box">
            <h2>✅ Cleaning Service Request Submitted!</h2>
            <p>Thank you for choosing our cleaning service.</p>

            <div class="details">
                <p><strong>🚗 Car Type:</strong> <?php echo htmlspecialchars($car_type); ?></p>
                <p><strong>📍 Location:</strong> <?php echo htmlspecialchars($location); ?></p>
                <p><strong>📅 Date:</strong> <?php echo htmlspecialchars($date); ?></p>
            </div>

            <a class="payment-button" href="payment.php">✅ Confirm & Proceed to Payment 💳</a>
        </div>

        </body>
        </html>
        <?php
    } else {
        echo "<h3>Error: " . $stmt->error . "</h3>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<h3>Invalid Request.</h3>";
}
?>

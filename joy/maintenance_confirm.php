<?php
// maintenance_confirm.php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_model = $_POST['car_model'];
    $issue = $_POST['issue'];
    $date = $_POST['date'];

    // Insert data into the correct table and columns
    $stmt = $conn->prepare("INSERT INTO maintenance_requests (car_model, issue, maintenance_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $car_model, $issue, $date);

    if ($stmt->execute()) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Maintenance Confirmation</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background: linear-gradient(135deg, #f0f4f7, #d9e4f5);
                    padding: 40px;
                    text-align: center;
                    color: #333;
                }
                .confirmation-box {
                    max-width: 600px;
                    margin: 50px auto;
                    background-color: #fff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
                }
                h2 {
                    color: #28a745;
                }
                .details {
                    text-align: left;
                    margin-top: 20px;
                }
                .payment-button {
                    display: inline-block;
                    margin-top: 25px;
                    padding: 12px 25px;
                    background-color: #007BFF;
                    color: white;
                    text-decoration: none;
                    border-radius: 6px;
                    transition: background-color 0.3s ease;
                }
                .payment-button:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>
        <body>

        <div class="confirmation-box">
            <h2>✅ Maintenance Request Submitted!</h2>
            <div class="details">
                <p><strong>Car Model:</strong> <?php echo htmlspecialchars($car_model); ?></p>
                <p><strong>Issue:</strong> <?php echo nl2br(htmlspecialchars($issue)); ?></p>
                <p><strong>Date:</strong> <?php echo htmlspecialchars($date); ?></p>
            </div>

            <a class="payment-button" href="payment.php">Confirm Now & Make Payment 💳</a>
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

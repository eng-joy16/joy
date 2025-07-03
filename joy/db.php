<?php
$host = "localhost";      // Hostname
$username = "root";        // Default XAMPP username
$password = "";            // No password by default
$database = "car_rental";  // Your database name

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

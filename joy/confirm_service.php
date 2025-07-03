<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate form fields
    if (isset($_POST['service_name']) && isset($_POST['car_type']) && isset($_POST['location']) && isset($_POST['service_date'])) {
        
        $service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
        $car_type = mysqli_real_escape_string($conn, $_POST['car_type']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $service_date = mysqli_real_escape_string($conn, $_POST['service_date']);

        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

        $sql = "INSERT INTO service_confirmations (user_id, service_name, car_type, location, service_date) 
                VALUES ('$user_id', '$service_name', '$car_type', '$location', '$service_date')";

        if (mysqli_query($conn, $sql)) {
            $booking_id = mysqli_insert_id($conn);
            header("Location: payment.php?booking_id=$booking_id");
            exit();
        } else {
            echo "Database Error: " . mysqli_error($conn);
        }

    } else {
        echo "Error: Missing form fields.";
    }
} else {
    header("Location: service_booking.php");
    exit();
}
?>

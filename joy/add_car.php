<?php
include 'db.php';
session_start();

if (isset($_POST['submit'])) {
    $model = $_POST['model'];
    $location = $_POST['location'];
    $price = $_POST['price'];

    // Image upload
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    // Create uploads directory if not exists
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    move_uploaded_file($tmp, "uploads/" . $image);

    // Prepare and execute SQL statement
    $query = "INSERT INTO cars (model, location, price, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssis", $model, $location, $price, $image);

    if ($stmt->execute()) {
        header("Location: rent.php?success=car_added");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Car Ad</title>
    <style>
        body {
            background: #000;
            color: white;
            font-family: Arial, sans-serif;
            padding: 40px;
        }
        form {
            max-width: 450px;
            margin: auto;
            background: #111;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 102, 0, 0.5);
        }
        form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ff6600;
        }
        input, button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background: #222;
            color: white;
        }
        input::placeholder {
            color: #aaa;
        }
        button {
            background: #ff6600;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #ff4500;
        }
    </style>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <h2>🚗 Add New Car </h2>
        <input type="text" name="model" placeholder="Car Model" required>
        <input type="text" name="location" placeholder="Location" required>
        <input type="number" name="price" placeholder="Price per day (BDT)" required>
        <input type="file" name="image" required>
        <button type="submit" name="submit">Add Car</button>
    </form>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>

<h2>Welcome, Admin</h2>
<a href="admin_logout.php">Logout</a>

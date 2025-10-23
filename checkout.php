<?php
session_start();
include 'includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // In real system, store order in database
    unset($_SESSION['cart']); // Clear cart after order
    $success = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Checkout</h1>

    <?php if (!empty($success)): ?>
        <p>Order successfully placed!</p>
        <a href="index.php">Back to Home</a>
    <?php else: ?>
        <form method="post">
            <label>Name: <input type="text" name="name" required></label><br>
            <label>Address: <input type="text" name="address" required></label><br>
            <label>City: <input type="text" name="city" required></label><br>
            <label>State: <input type="text" name="state" required></label><br>
            <label>Zip: <input type="text" name="zip" required></label><br>
            <label>Phone: <input type="text" name="phone" required></label><br>
            <button type="submit">Confirm Order</button>
        </form>
    <?php endif; ?>
</body>
</html>

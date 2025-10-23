<?php
session_start();

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add or update quantity
if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] += $quantity;
} else {
    $_SESSION['cart'][$product_id] = $quantity;
}

// Success message
$_SESSION['message'] = "$quantity item(s) added to your cart!";
header('Location: index.php');
exit;
?>

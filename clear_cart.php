<?php
session_start();

// Clear the cart
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

// Redirect back to home page (optional)
header("Location: index.php");
exit();
?>

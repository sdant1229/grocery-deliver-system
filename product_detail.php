<?php
session_start();
include 'includes/db_connect.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$product_id = intval($_GET['id']);
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    header("Location: index.php");
    exit;
}

// Handle add to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $qty = intval($_POST['quantity']);
    if ($qty > 0) {
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $qty;
        } else {
            $_SESSION['cart'][$product_id] = $qty;
        }
    }
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($product['name']) ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1><?= htmlspecialchars($product['name']) ?></h1>
    <img src="assets/images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
    <p><?= htmlspecialchars($product['description']) ?></p>
    <p>Price: $<?= number_format($product['price'], 2) ?></p>

    <form method="post">
        <label>Quantity: <input type="number" name="quantity" value="1" min="1"></label>
        <button type="submit">Add to Cart</button>
    </form>

    <a href="index.php">Back to Products</a>
</body>
</html>

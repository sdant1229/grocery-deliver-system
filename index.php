<?php
session_start();
include 'includes/db_connect.php';

$cart_count = !empty($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grocery Store</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <h1>Grocery Store</h1>
        <a href="cart.php" class="cart-btn">Cart (<?= $cart_count ?>)</a>
    </header>

    <div class="products">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="product-card">
                <img src="assets/images/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                <h3><?= htmlspecialchars($row['name']) ?></h3>
                <p>$<?= number_format($row['price'], 2) ?></p>
                <a href="product_detail.php?id=<?= $row['id'] ?>">Add to Cart</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>


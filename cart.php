<?php
session_start();
include 'includes/db_connect.php';

// Remove item
if (isset($_GET['remove'])) {
    $remove_id = intval($_GET['remove']);
    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }
    header("Location: cart.php");
    exit;
}

// Update quantities
if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantities'] as $id => $qty) {
        $id = intval($id);
        $qty = intval($qty);
        if ($qty <= 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id] = $qty;
        }
    }
    header("Location: cart.php");
    exit;
}

// Fetch cart products
$cart_products = [];
$total_price = 0;
if (!empty($_SESSION['cart'])) {
    $ids = implode(',', array_map('intval', array_keys($_SESSION['cart'])));
    if ($ids) {
        $sql = "SELECT * FROM products WHERE id IN ($ids)";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $row['quantity'] = $_SESSION['cart'][$row['id']];
            $row['subtotal'] = $row['quantity'] * $row['price'];
            $total_price += $row['subtotal'];
            $cart_products[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Your Cart</h1>

    <?php if (empty($cart_products)): ?>
        <p>Your cart is empty.</p>
        <a href="index.php">Continue Shopping</a>
    <?php else: ?>
        <form method="post">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($cart_products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td>$<?= number_format($product['price'], 2) ?></td>
                        <td>
                            <input type="number" name="quantities[<?= $product['id'] ?>]" value="<?= $product['quantity'] ?>" min="1">
                        </td>
                        <td>$<?= number_format($product['subtotal'], 2) ?></td>
                        <td>
                            <a href="cart.php?remove=<?= $product['id'] ?>">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <p>Total: $<?= number_format($total_price, 2) ?></p>
            <button type="submit" name="update_cart">Update Cart</button>
        </form>
        <a href="checkout.php">Proceed to Checkout</a>
        <a href="index.php">Continue Shopping</a>
    <?php endif; ?>
</body>
</html>

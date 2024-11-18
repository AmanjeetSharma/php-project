<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];

$query = "
    SELECT p.name, p.price, c.quantity 
    FROM cart c 
    JOIN products p ON c.product_id = p.id 
    WHERE c.user_id = ?
";
$stmt = $db->prepare($query);
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total = 0;
foreach ($cart_items as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Your Cart</h2>
        <?php if (count($cart_items) > 0): ?>
            <?php foreach ($cart_items as $item): ?>
                <div class="cart-item">
                    <span><?php echo htmlspecialchars($item['name']); ?></span>
                    <span>$<?php echo number_format($item['price'], 2); ?> x <?php echo $item['quantity']; ?></span>
                </div>
            <?php endforeach; ?>
            <div class="total">Total: $<?php echo number_format($total, 2); ?></div>
            <a href="checkout.php">Checkout</a>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>
</html>

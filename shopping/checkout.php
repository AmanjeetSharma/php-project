<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT p.name, p.price, c.quantity FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id = ?";
$stmt = $db->prepare($query);
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll();

$total = 0;
$total_items = 0;
foreach ($cart_items as $item) {
    $total += $item['price'] * $item['quantity'];
    $total_items += $item['quantity'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clear_cart_query = "DELETE FROM cart WHERE user_id = ?";
    $clear_stmt = $db->prepare($clear_cart_query);
    $clear_stmt->execute([$user_id]);

    header("Location: Thank.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .checkout-container {
            max-width: 800px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .checkout-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .checkout-header h1 {
            font-size: 2em;
            margin: 0;
            color: #333;
        }

        .checkout-header p {
            font-size: 1.2em;
            color: #555;
        }

        .checkout-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .checkout-table th,
        .checkout-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .checkout-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .checkout-summary {
            font-size: 1.2em;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }

        .btn-checkout {
            display: inline-block;
            padding: 12px 20px;
            font-size: 1em;
            font-weight: bold;
            color: #fff;
            background-color: #333;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-checkout:hover {
            background-color: #555;
        }

    </style>
</head>
<body>
    <div class="checkout-container">
        <div class="checkout-header">
            <h1>Checkout</h1>
            <p>You have purchased <strong><?php echo $total_items; ?></strong> items</p>
        </div>
        
        <table class="checkout-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                    <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                    <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="checkout-summary">
            Total Amount: $<?php echo number_format($total, 2); ?>
        </div>
        
        <form method="POST">
            <button type="submit" class="btn-checkout">Confirm Purchase</button>
        </form>
    </div>
</body>
</html>

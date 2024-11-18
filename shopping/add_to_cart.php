<?php
session_start();
include 'db.php';

if (isset($_POST['product_id']) && isset($_SESSION['user_id'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];
    
    // Check if product is already in cart
    $stmt = $db->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->execute([$user_id, $product_id]);
    $item = $stmt->fetch();

    if ($item) {
        // Update quantity if already in cart
        $stmt = $db->prepare("UPDATE cart SET quantity = quantity + 1 WHERE id = ?");
        $stmt->execute([$item['id']]);
    } else {
        // Insert new record into cart
        $stmt = $db->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)");
        $stmt->execute([$user_id, $product_id]);
    }
    header("Location: products.php");
    exit();
}
?>

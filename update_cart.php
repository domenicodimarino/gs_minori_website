<?php
if (isset($_POST['index']) && isset($_POST['quantity'])) {
    $index = intval($_POST['index']);
    $quantity = intval($_POST['quantity']);
    if (isset($_COOKIE['cart'])) {
        $cart = unserialize($_COOKIE['cart']);
        if (isset($cart[$index])) {
            $cart[$index]['quantity'] = $quantity;
            setcookie('cart', serialize($cart), time() + (30 * 24 * 60 * 60));
            echo json_encode(['status' => 'success', 'message' => 'Quantity updated']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Product not found']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Cart not found']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
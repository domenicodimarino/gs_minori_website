<?php
if (isset($_POST['index'])) {
    $index = intval($_POST['index']);
    if (isset($_COOKIE['cart'])) {
        $cart = unserialize($_COOKIE['cart']);
        if (isset($cart[$index])) {
            array_splice($cart, $index, 1);
            setcookie('cart', serialize($cart), time() + (30 * 24 * 60 * 60));
        }
    }
}
?>
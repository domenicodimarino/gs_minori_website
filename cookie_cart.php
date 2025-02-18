<?php 
    function addProduct($product_name, $product_image, $quantity, $price) {
        global $cart; // Make $cart accessible within this function
        // Controlla se l'articolo esiste già nel carrello
        $found = false;
        foreach ($cart as &$item) {
            if ($item['product_name'] === $product_name) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }
        // If the product was not found, add it to the cart
        if (!$found) {
            $cart[] = [
                'product_name' => $product_name,
                'product_image' => $product_image,
                'quantity' => (int)$quantity,
                'price' => (float)$price
            ];
        }
        // Update the cookie with the new cart
        setcookie('cart', serialize($cart), time() + (30 * 24 * 60 * 60));
    }
?>
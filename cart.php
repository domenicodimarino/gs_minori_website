<?php include 'header.php'; ?>
<?php
// Cookie del carrello
if (!isset($_COOKIE['cart'])) {
    $cart = [];
} else {
    $cart = unserialize($_COOKIE['cart']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_SESSION['cart_updated']) == false) {

    // Collegamento immagini con shop.php
    $product_images = isset($_POST['product_image']) ? $_POST['product_image'] : [];
    $product_names = isset($_POST['product_name']) ? $_POST['product_name'] : [];
    $product_prices = isset($_POST['product_price']) ? $_POST['product_price'] : [];
    $quantities = isset($_POST['quantity']) ? $_POST['quantity'] : [];

    for ($i = 0; $i < count($product_images); $i++) {
        if ($quantities[$i] > 0) {
            $found = false;
            for ($j = 0; $j < count($cart); $j++) {
                if ($cart[$j]['product_name'] === $product_names[$i]) {
                    $cart[$j]['quantity'] += $quantities[$i];
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $cart[] = [
                    'product_image' => $product_images[$i],
                    'product_name' => $product_names[$i],
                    'quantity' => $quantities[$i],
                    'price' => $product_prices[$i]
                ];
            }
        }
    }

    setcookie('cart', serialize($cart), time() + (30 * 24 * 60 * 60));
    $_SESSION['cart_updated'] = true; // Imposta la variabile di sessione per evitare duplicati
    $cartItems = $cart;
} else {
    $cartItems = $cart; // Initialize $cartItems from the cookie
}

// Calcolo del prezzo totale
$totalPrice = 0;
foreach ($cart as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello GS Minori</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="cart.css" type="text/css"/>
</head>
<body>
    <?php
    if ($totalPrice > 0) {
        echo "<h1>Riepilogo ordine</h1>";
        echo "<h2>Totale: €" . number_format($totalPrice, 2, ',', '.') . "</h2>";
    } else {
        echo "<p>Il carrello è vuoto.</p>";
    }

    for ($i = 0; $i < count($cart); $i++) {
        $product_image = is_array($cart[$i]['product_image']) ? '' : $cart[$i]['product_image'];
        $product_name = is_array($cart[$i]['product_name']) ? '' : $cart[$i]['product_name'];
        $price = is_array($cart[$i]['price']) ? '' : $cart[$i]['price'];
        $quantity = is_array($cart[$i]['quantity']) ? '' : $cart[$i]['quantity'];
        echo '<div class="cart-item">';
        echo '<img src="' . htmlspecialchars($product_image) . '" alt="' . htmlspecialchars($product_name) . '" class="cart-image">';
        echo '<p>' . htmlspecialchars($product_name) . '<br>' . htmlspecialchars((string)$price) . '€</p>';
        echo '<p>Quantità: ' . htmlspecialchars((string)$quantity) . '</p>';
        echo '<p>Prezzo per quantità: ' . htmlspecialchars((string)$quantity*$price) . '€</p>';
        echo '</div>';
    }
    ?>
    <div class="confirm-order-container">
        <form action="checkout_cart.php" method="POST">
            <!-- Hidden input fields to pass data to checkout_cart.php -->
            <input type="number" name="importo" value="<?php echo $totalPrice; ?>" hidden>
            <?php
            foreach ($cartItems as $index => $item) {
                $productName = isset($item['product_name']) ? (is_array($item['product_name']) ? '' : $item['product_name']) : '';
                $quantity = isset($item['quantity']) ? (is_array($item['quantity']) ? '' : $item['quantity']) : '';
                $price = isset($item['price']) ? (is_array($item['price']) ? '' : $item['price']) : '';
                echo '<input type="hidden" name="cartItems[' . $index . '][productName]" value="' . htmlspecialchars($productName) . '">';
                echo '<input type="hidden" name="cartItems[' . $index . '][quantity]" value="' . htmlspecialchars($quantity) . '">';
                echo '<input type="hidden" name="cartItems[' . $index . '][price]" value="' . htmlspecialchars($price) . '">';
            }
            ?>
            <button type="submit" class="confirm-order-button">Conferma Ordine</button>
        </form>
        <form action="clear_cart.php" method="POST">
            <button type="submit">Svuota il carrello</button>
        </form>
    </div>
    <?php include 'footer.html'; ?>
</body>
</html>
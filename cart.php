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
    <?php include 'header.php'; ?>
    <h1>Carrello</h1>
    <h2>Riepilogo ordine: </h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $totalPrice = $_POST['totalPrice'];
        $cartItems = $_POST['cartItems'];
        echo "<h2>Totale: €" . number_format($totalPrice, 2, ',', '.') . "</h2>";
        echo "<ul>";
        foreach ($cartItems as $item) {
            echo "<li>" . htmlspecialchars($item['productName']) . " - Quantità: " . htmlspecialchars($item['quantity']) . " - Prezzo: €" . number_format($item['price'], 2, ',', '.') . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Il carrello è vuoto.</p>";
    }
    //collegamento immagini con shop.php
    $product_images = $_POST['product_image'];
    $product_names = $_POST['product_name'];
    $product_prices = $_POST['product_price'];
    $quantities = $_POST['quantity'];

    for ($i = 0; $i < count($product_images); $i++) {
        if ($quantities[$i] > 0) {
            echo '<div class="cart-item">';
            echo '<img src="' . htmlspecialchars($product_images[$i]) . '" alt="' . htmlspecialchars($product_names[$i]) . '" class="cart-image">';
            echo '<p>' . htmlspecialchars($product_names[$i]) . '<br>' . htmlspecialchars($product_prices[$i]) . '€</p>';
            echo '<p>Quantità: ' . htmlspecialchars($quantities[$i]) . '</p>';
            echo '</div>';
        }
    }
    ?>
    <div class="confirm-order-container">
        <form action="checkout_cart.php" method="POST">
            <!-- Hidden input fields to pass data to checkout_cart.php -->
            <input type="number" name="importo" value="<?php echo $totalPrice; ?>" hidden>
            <button type="submit" class="confirm-order-button">Conferma Ordine</button>
        </form>
    </div>
    <?php include 'footer.html'; ?>
</body>
</html>
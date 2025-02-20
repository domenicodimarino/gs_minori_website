<?php include 'header.php'; ?>
<?php 
    $_SESSION['cart_updated'] = false;

    // Deserializza il cookie 'cart' e calcola la quantità totale
    $totalQuantity = 0;
    if (isset($_COOKIE['cart'])) {
        $cart = unserialize($_COOKIE['cart']);
        foreach ($cart as $item) {
            $totalQuantity += $item['quantity'];
        }
    }
?>
<html>

<head>
    <title>GS Minori - Shop</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="shop.css" type="text/css"/>
    <link rel="stylesheet" href="slideshow.css" type="text/css"/>
</head>
<body>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Cerca..." class="search-input">
        
        <div class="icon-group">
            <button class="clear-button" id="clearButton">
                <i class="fas fa-times"></i> <!-- X per cancellare -->
            </button>
            <button class="search-button">
                <i class="fas fa-search"></i> <!-- Lente -->
            </button>
        </div>
        <button class="cart-button">
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            <span id="cart-count" class="cart-count" style="display: none;">0</span> <!-- Aggiungi questo elemento -->
        </button>
    </div>
    <ul id="resultsList">
        <li>Canotta da gara HOME</li>
        <li>Canotta da gara AWAY</li>
        <li>Pantaloncini da gara HOME</li>
        <li>Pantaloncini da gara AWAY</li>
        <li>Felpa con cappuccio</li>
        <li>Felpa senza cappuccio</li>
        <li>Pantaloni GS Minori</li>
        <li>Coprimaglia GS Minori</li>
        <li>Giubbino GS Minori</li>
        <li>Felpa Tifoso GS Minori</li>
        <li>Zaino GS Minori</li>
        <li>Borsone GS Minori</li>
    </ul>
    <form id="cartForm" action="cart.php" method="POST">
        <div class="image-container">
            <?php
            $products = [
                [
                    'name' => 'Canotta da gara HOME',
                    'price' => '29.99',
                    'images' => ['photo_shop/canotta_avanti_home.jpeg', 'photo_shop/canotta_dietro_home.jpeg']
                ],
                [
                    'name' => 'Canotta da gara AWAY',
                    'price' => '29.99',
                    'images' => ['photo_shop/canotta_avanti_away.jpeg', 'photo_shop/canotta_dietro_away.jpeg']
                ],
                [
                    'name' => 'Pantaloncini da gara HOME',
                    'price' => '19.99',
                    'images' => ['photo_shop/pant_avanti_home.jpeg', 'photo_shop/pant_dietro_home.jpeg']
                ],
                [
                    'name' => 'Pantaloncini da gara AWAY',
                    'price' => '19.99',
                    'images' => ['photo_shop/pant_avanti_away.jpeg', 'photo_shop/pant_dietro_away.jpeg']
                ],
                [
                    'name' => 'Felpa con cappuccio',
                    'price' => '29.99',
                    'images' => ['photo_shop/felpa_cappuccio_avanti.jpeg', 'photo_shop/felpa_cappuccio_dietro.jpeg']
                ],
                [
                    'name' => 'Felpa senza cappuccio',
                    'price' => '19.99',
                    'images' => ['photo_shop/felpa_nocap_avanti.jpeg', 'photo_shop/felpa_nocap_dietro.jpeg']
                ],
                [
                    'name' => 'Pantaloni GS Minori',
                    'price' => '14.99',
                    'images' => ['photo_shop/pant_nocap.jpeg']
                ],
                [
                    'name' => 'Coprimaglia GS Minori',
                    'price' => '24.99',
                    'images' => ['photo_shop/coprimaglia_avanti.jpeg', 'photo_shop/coprimaglia_dietro.jpeg']
                ],
                [
                    'name' => 'Giubbino GS Minori',
                    'price' => '59.99',
                    'images' => ['photo_shop/giubbino_avanti.jpeg', 'photo_shop/giubbino_avanti_2.jpeg', 'photo_shop/giubbino_dietro.jpeg']
                ],
                [
                    'name' => 'Borsone GS Minori',
                    'price' => '24.99',
                    'images' => ['photo_shop/borsone_av.jpg', 'photo_shop/borsone_di.jpg']
                ],
                [
                    'name' => 'Zaino GS Minori',
                    'price' => '29.99',
                    'images' => ['photo_shop/zaino_avanti.jpg', 'photo_shop/zaino_dietro.jpg']
                ],
                [
                    'name' => 'Felpa Tifoso GS Minori',
                    'price' => '39.99',
                    'images' => ['photo_shop/felpa_1_avanti.jpg', 'photo_shop/felpa_1_dietro.jpg']
                ]
            ];

            foreach ($products as $index => $product) {
                echo '<div class="image-item">';
                echo '<div class="slideshow-container" data-index="' . $index . '">';
                foreach ($product['images'] as $imgIndex => $image) {
                    echo '<div class="mySlides">';
                    echo '<div class="numbertext">' . ($imgIndex + 1) . ' / ' . count($product['images']) . '</div>';
                    echo '<img src="' . $image . '" style="width: 100%;" alt="' . $product['name'] . '">';
                    echo '</div>';
                }
                echo '<a class="prev" onclick="plusSlides(-1, ' . $index . ')">&#10094;</a>';
                echo '<a class="next" onclick="plusSlides(1, ' . $index . ')">&#10095;</a>';
                echo '<br>';
                echo '<div style="text-align:center">';
                foreach ($product['images'] as $imgIndex => $image) {
                    echo '<span class="dot" onclick="currentSlide(' . ($imgIndex + 1) . ', ' . $index . ')"></span>';
                }
                echo '</div>';
                echo '</div>';
                echo '<p>' . $product['name'] . '<br>' . $product['price'] . '€</p>';
                echo '<input type="hidden" name="product_image[]" value="' . $product['images'][0] . '">';
                echo '<input type="hidden" name="product_name[]" value="' . $product['name'] . '">';
                echo '<input type="hidden" name="product_price[]" value="' . $product['price'] . '">';
                echo '<div class="quantity-controls">';
                echo '<button type="button" class="decrement">-</button>';
                echo '<input type="number" class="quantity" name="quantity[]" value="0" min="0">';
                echo '<button type="button" class="increment">+</button>';
                echo '</div>';
                echo '</div>';
            }
            ?>


        </div>
        <button type="submit" id="confirmButton">AGGIUNGI AL CARRELLO</button>
    </form>

    <script src="shop.js" defer></script>
    <script src="slideshow.js" defer></script>
    <script>
        // Passa la quantità totale a JavaScript
        const totalQuantity = <?php echo $totalQuantity; ?>;

        // Funzione per aggiornare il conteggio del carrello
        function updateCartCount() {
            document.getElementById('cart-count').textContent = totalQuantity;
            if (totalQuantity > 0) {
                document.getElementById('cart-count').style.display = 'block';
            } else {
                document.getElementById('cart-count').style.display = 'none';
            }
        }

        // Aggiorna il conteggio del carrello all'avvio
        document.addEventListener('DOMContentLoaded', updateCartCount);
    </script>
    <?php include 'footer.html'; ?>
</body>
</html>
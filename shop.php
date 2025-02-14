<html>
    <head>
        <title>GS Minori - Shop</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="shop.css" type="text/css"/>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php include 'header.html'; ?>
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
            <i class="fas fa-shopping-cart"></i> <!-- Carrello -->
        </button>
    </div>
    <ul id="resultsList">
    </ul>
    <div class="image-container">
        <div class="image-item">
            <img src="mino.png" alt="Image 3">
            <p>Pantaloncini da gara HOME<br> 19,99€</p>
            <div class="quantity-controls">
                <button class="decrement">-</button>
                <input type="number" class="quantity" value="0" min="0">
                <button class="increment">+</button>
            </div>
        </div>
        <div class="image-item">
            <img src="mino.png" alt="Image 4">
            <p>Pantaloncini da gara AWAY<br> 29,99€</p>
            <div class="quantity-controls">
                <button class="decrement">-</button>
                <input type="number" class="quantity" value="0" min="0">
                <button class="increment">+</button>
            </div>
        </div>
        <div class="image-item">
            <img src="mino.png" alt="Image 5">
            <p>Felpa GS Minori <br>29,99€</p>
            <div class="quantity-controls">
                <button class="decrement">-</button>
                <input type="number" class="quantity" value="0" min="0">
                <button class="increment">+</button>
            </div>
        </div>
        <div class="image-item">
            <img src="mino.png" alt="Image 6">
            <p>Giubbino GS Minori <br>39,99€</p>
            <div class="quantity-controls">
                <button class="decrement">-</button>
                <input type="number" class="quantity" value="0" min="0">
                <button class="increment">+</button>
            </div>
        </div>
    </div>

    <button id="confirmButton">Conferma</button>

    <script src="shop.js"></script>
    <?php include 'footer.html'; ?>
    </body>
</html>
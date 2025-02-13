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
    <div class="image-container">
        <div class="image-item">
            <img src="mino.png" alt="Image 1">
            <p>Canotta da gara HOME <br> 29,99€</p>
        </div>
        <div class="image-item">
            <img src="mino.png" alt="Image 2">
            <p>Canotta da gara AWAY <br> 29,99€</p>
        </div>
        <div class="image-item">
            <img src="mino.png" alt="Image 3">
            <p>Pantaloncini da gara HOME<br> 19,99€</p>
        </div>
        <div class="image-item">
            <img src="mino.png" alt="Image 4">
            <p>Pantaloncini da gara AWAY<br> 29,99€</p>
        </div>
        <div class="image-item">
            <img src="mino.png" alt="Image 5">
            <p>Felpa GS Minori <br>29,99€</p>
        </div>
        <div class="image-item">
            <img src="mino.png" alt="Image 6">
            <p>Giubbino GS Minori <br>39,99€</p>
        </div>
    </div>
    <ul id="resultsList">
        <li>Canotta da gara HOME</li>
        <li>Canotta da gara AWAY</li>
        <li>Pantaloncini da gara HOME</li>
        <li>Pantaloncini da gara AWAY</li>
        <li>Felpa GS Minori</li>
        <li>Giubbino GS Minori</li>
    </ul>

    <script src="shop.js"></script>
    <?php include 'footer.html'; ?>
    </body>
</html>
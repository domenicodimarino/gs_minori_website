<?php include 'header.php'; ?>
<?php 
    $_SESSION['cart_updated'] = false;
?>
<html>

<head>
    <title>GS Minori - Shop</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="shop.css" type="text/css"/>
    <link rel="stylesheet" href="slideshow.css" type="text/css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a> <!-- Carrello -->
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
    </ul>
    <form id="cartForm" action="cart.php" method="POST">
        <div class="image-container">
            <div class="image-item">
                <!-- Slideshow container -->
                
                <div class="slideshow-container">
                    <!-- Immagini dello stesso prodotto -->
                    <div class="mySlides">
                        <div class="numbertext">1 / 2</div>
                        <img src="photo_shop/canotta_avanti_home.jpeg" style="width: 100%;" alt="Canotta avanti HOME">
                    </div>
                    <div class="mySlides">
                        <div class="numbertext">2 / 2</div>
                        <img src="photo_shop/canotta_dietro_home.jpeg" style="width: 100%;" alt="Canotta dietro HOME">
                    </div>

                    <!-- Bottoni prev e next -->
                    <a class="prev" onclick="plusSlides(-1, this.parentNode.dataset.index)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, this.parentNode.dataset.index)">&#10095;</a>

                    <!-- Dots -->
                    <br>
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1, this.parentNode.parentNode.dataset.index)"></span>
                        <span class="dot" onclick="currentSlide(2, this.parentNode.parentNode.dataset.index)"></span>
                    </div>
                </div>
                
                <p>Canotta da gara HOME<br> 29,99€</p>
                <input type="hidden" name="product_image[]" value="photo_shop/canotta_avanti_home.jpeg">
                <input type="hidden" name="product_name[]" value="Canotta da gara HOME">
                <input type="hidden" name="product_price[]" value="29.99">
                <div class="quantity-controls">
                    <button type="button" class="decrement">-</button>
                    <input type="number" class="quantity" name="quantity[]" value="0" min="0">
                    <button type="button" class="increment">+</button>
                </div>
            </div>
            
            <div class="image-item">

                <!-- Slideshow container -->
                <div class="slideshow-container">
                    <!-- Immagini dello stesso prodotto -->
                    <div class="mySlides">
                        <div class="numbertext">1 / 2</div>
                        <img src="photo_shop/canotta_avanti_away.jpeg" style="width: 100%;" alt="Canotta avanti AWAY">
                    </div>
                    <div class="mySlides">
                        <div class="numbertext">2 / 2</div>
                        <img src="photo_shop/canotta_dietro_away.jpeg" style="width: 100%;" alt="Canotta dietro AWAY">
                    </div>
                    <!-- Bottoni prev e next -->
                    <a class="prev" onclick="plusSlides(-1, this.parentNode.dataset.index)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, this.parentNode.dataset.index)">&#10095;</a>
                    <br>
                    <!-- Dots -->
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1, this.parentNode.parentNode.dataset.index)"></span>
                        <span class="dot" onclick="currentSlide(2, this.parentNode.parentNode.dataset.index)"></span>
                    </div>
                </div>

                <p>Canotta da gara AWAY<br> 29,99€</p>
                <input type="hidden" name="product_image[]" value="photo_shop/canotta_avanti_away.jpeg">
                <input type="hidden" name="product_name[]" value="Canotta da gara AWAY">
                <input type="hidden" name="product_price[]" value="29.99">
                <div class="quantity-controls">
                    <button type="button" class="decrement">-</button>
                    <input type="number" class="quantity" name="quantity[]" value="0" min="0">
                    <button type="button" class="increment">+</button>
                </div>
            </div>
            
            
            <div class="image-item">
                
                <!-- Slideshow container -->
                <div class="slideshow-container">
                    <!-- Immagini dello stesso prodotto -->
                    <div class="mySlides">
                        <div class="numbertext">1 / 2</div>
                        <img src="photo_shop/pant_avanti_home.jpeg" style="width: 100%;" alt="Pantaloncini avanti HOME">
                    </div>
                    <div class="mySlides">
                        <div class="numbertext">2 / 2</div>
                        <img src="photo_shop/pant_dietro_home.jpeg" style="width: 100%;" alt="Pantaloncini dietro HOME">
                    </div>
                    <!-- Bottoni prev e next -->
                    <a class="prev" onclick="plusSlides(-1, this.parentNode.dataset.index)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, this.parentNode.dataset.index)">&#10095;</a>
                    <br>
                    <!-- Dots -->
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1, this.parentNode.parentNode.dataset.index)"></span>
                        <span class="dot" onclick="currentSlide(2, this.parentNode.parentNode.dataset.index)"></span>
                    </div>
                </div>

                <p>Pantaloncini da gara HOME<br> 19,99€</p>
                <input type="hidden" name="product_image[]" value="photo_shop/pant_avanti_home.jpeg">
                <input type="hidden" name="product_name[]" value="Pantaloncini da gara HOME">
                <input type="hidden" name="product_price[]" value="19.99">
                <div class="quantity-controls">
                    <button type="button" class="decrement">-</button>
                    <input type="number" class="quantity" name="quantity[]" value="0" min="0">
                    <button type="button" class="increment">+</button>
                </div>
            </div>
            <div class="image-item">
                
                <!-- Slideshow container -->
                <div class="slideshow-container">
                    <!-- Immagini dello stesso prodotto -->
                    <div class="mySlides">
                        <div class="numbertext">1 / 2</div>
                        <img src="photo_shop/pant_avanti_away.jpeg" style="width: 100%;" alt="Pantaloncini avanti AWAY">
                    </div>
                    <div class="mySlides">
                        <div class="numbertext">2 / 2</div>
                        <img src="photo_shop/pant_dietro_away.jpeg" style="width: 100%;" alt="Pantaloncini dietro AWAY">
                    </div>
                    <!-- Bottoni prev e next -->
                    <a class="prev" onclick="plusSlides(-1, this.parentNode.dataset.index)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, this.parentNode.dataset.index)">&#10095;</a>
                    <br>
                    <!-- Dots -->
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1, this.parentNode.parentNode.dataset.index)"></span>
                        <span class="dot" onclick="currentSlide(2, this.parentNode.parentNode.dataset.index)"></span>
                    </div>
                </div>

                <p>Pantaloncini da gara AWAY<br> 19,99€</p>
                <input type="hidden" name="product_image[]" value="photo_shop/pant_avanti_away.jpeg">
                <input type="hidden" name="product_name[]" value="Pantaloncini da gara AWAY">
                <input type="hidden" name="product_price[]" value="19.99">
                <div class="quantity-controls">
                    <button type="button" class="decrement">-</button>
                    <input type="number" class="quantity" name="quantity[]" value="0" min="0">
                    <button type="button" class="increment">+</button>
                </div>
            </div>
            
            <div class="image-item">
                
                <!-- Slideshow container -->
                <div class="slideshow-container">
                    <!-- Immagini dello stesso prodotto -->
                    <div class="mySlides">
                        <div class="numbertext">1 / 2</div>
                        <img src="photo_shop/felpa_cappuccio_avanti.jpeg" style="width: 100%;" alt="Felpa con cappuccio AVANTI">
                    </div>
                    <div class="mySlides">
                        <div class="numbertext">2 / 2</div>
                        <img src="photo_shop/felpa_cappuccio_dietro.jpeg" style="width: 100%;" alt="Felpa con cappuccio DIETRO">
                    </div>
                    <!-- Bottoni prev e next -->
                    <a class="prev" onclick="plusSlides(-1, this.parentNode.dataset.index)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, this.parentNode.dataset.index)">&#10095;</a>
                    <br>
                    <!-- Dots -->
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1, this.parentNode.parentNode.dataset.index)"></span>
                        <span class="dot" onclick="currentSlide(2, this.parentNode.parentNode.dataset.index)"></span>
                    </div>
                </div>    

                <p>Felpa con cappuccio <br>29,99€</p>
                <input type="hidden" name="product_image[]" value="photo_shop/felpa_cappuccio_avanti.jpeg">
                <input type="hidden" name="product_name[]" value="Felpa con cappuccio">
                <input type="hidden" name="product_price[]" value="29.99">
                <div class="quantity-controls">
                    <button type="button" class="decrement">-</button>
                    <input type="number" class="quantity" name="quantity[]" value="0" min="0">
                    <button type="button" class="increment">+</button>
                </div>
            </div>

            <div class="image-item">

                <!-- Slideshow container -->
                <div class="slideshow-container">
                    <!-- Immagini dello stesso prodotto -->
                    <div class="mySlides">
                        <div class="numbertext">1 / 2</div>
                        <img src="photo_shop/felpa_nocap_avanti.jpeg" style="width: 100%;" alt="Felpa senza cappuccio AVANTI">
                    </div>
                    <div class="mySlides">
                        <div class="numbertext">2 / 2</div>
                        <img src="photo_shop/felpa_nocap_dietro.jpeg" style="width: 100%;" alt="Felpa senza cappuccio DIETRO">
                    </div>
                    <!-- Bottoni prev e next -->
                    <a class="prev" onclick="plusSlides(-1, this.parentNode.dataset.index)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, this.parentNode.dataset.index)">&#10095;</a>
                    <br>
                    <!-- Dots -->
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1, this.parentNode.parentNode.dataset.index)"></span>
                        <span class="dot" onclick="currentSlide(2, this.parentNode.parentNode.dataset.index)"></span>
                    </div>
                </div>   

                <p>Felpa senza cappuccio <br>19,99€</p>
                <input type="hidden" name="product_image[]" value="photo_shop/felpa_nocap_avanti.jpeg">
                <input type="hidden" name="product_name[]" value="Felpa senza cappuccio">
                <input type="hidden" name="product_price[]" value="19.99">
                <div class="quantity-controls">
                    <button type="button" class="decrement">-</button>
                    <input type="number" class="quantity" name="quantity[]" value="0" min="0">
                    <button type="button" class="increment">+</button>
                </div>
            </div>

            <div class="image-item">

                <!-- Slideshow container -->
                <div class="slideshow-container">
                    <!-- Immagini dello stesso prodotto -->
                    <div class="mySlides">
                        <div class="numbertext">1 / 1</div>
                        <img src="photo_shop/pant_nocap.jpeg" style="width: 100%;" alt="Pantaloni GS Minori">
                    </div>
                    <!-- Bottoni prev e next -->
                    <a class="prev" onclick="plusSlides(-1, this.parentNode.dataset.index)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, this.parentNode.dataset.index)">&#10095;</a>
                    <br>
                    <!-- Dots -->
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1, this.parentNode.parentNode.dataset.index)"></span>
                    </div>
                </div>   

                <p>Pantaloni GS Minori <br>14,99€</p>
                <input type="hidden" name="product_image[]" value="photo_shop/pant_nocap.jpeg">
                <input type="hidden" name="product_name[]" value="Pantaloni GS Minori">
                <input type="hidden" name="product_price[]" value="14.99">
                <div class="quantity-controls">
                    <button type="button" class="decrement">-</button>
                    <input type="number" class="quantity" name="quantity[]" value="0" min="0">
                    <button type="button" class="increment">+</button>
                </div>
            </div>

            <div class="image-item">

                <!-- Slideshow container -->
                <div class="slideshow-container">
                    <!-- Immagini dello stesso prodotto -->
                    <div class="mySlides">
                        <div class="numbertext">1 / 2</div>
                        <img src="photo_shop/coprimaglia_avanti.jpeg" style="width: 100%;" alt="Coprimaglia GS Minori AVANTI">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">2 / 2</div>
                        <img src="photo_shop/coprimaglia_dietro.jpeg" style="width: 100%;" alt="Coprimaglia GS Minori DIETRO">
                    </div>

                    <!-- Bottoni prev e next -->
                    <a class="prev" onclick="plusSlides(-1, this.parentNode.dataset.index)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, this.parentNode.dataset.index)">&#10095;</a>
                    <br>
                    <!-- Dots -->
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1, this.parentNode.parentNode.dataset.index)"></span>
                        <span class="dot" onclick="currentSlide(2, this.parentNode.parentNode.dataset.index)"></span>
                    </div>
                </div>   

                <p>Coprimaglia GS Minori <br>24,99€</p>
                <input type="hidden" name="product_image[]" value="photo_shop/coprimaglia_avanti.jpeg">
                <input type="hidden" name="product_name[]" value="Coprimaglia GS Minori">
                <input type="hidden" name="product_price[]" value="24.99">
                <div class="quantity-controls">
                    <button type="button" class="decrement">-</button>
                    <input type="number" class="quantity" name="quantity[]" value="0" min="0">
                    <button type="button" class="increment">+</button>
                </div>
            </div>


            <div class="image-item">

                <!-- Slideshow container -->
                <div class="slideshow-container">
                    <!-- Immagini dello stesso prodotto -->
                    <div class="mySlides">
                        <div class="numbertext">1 / 3</div>
                        <img src="photo_shop/giubbino_avanti.jpeg" style="width: 100%;" alt="Giubbino GS Minori AVANTI">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">2 / 3</div>
                        <img src="photo_shop/giubbino_avanti_2.jpeg" style="width: 100%;" alt="Giubbino GS Minori AVANTI 2">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">3 / 3</div>
                        <img src="photo_shop/giubbino_dietro.jpeg" style="width: 100%;" alt="Giubbino GS Minori DIETRO">
                    </div>

                    <!-- Bottoni prev e next -->
                    <a class="prev" onclick="plusSlides(-1, this.parentNode.dataset.index)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, this.parentNode.dataset.index)">&#10095;</a>
                    <br>
                    <!-- Dots -->
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1, this.parentNode.parentNode.dataset.index)"></span>
                        <span class="dot" onclick="currentSlide(2, this.parentNode.parentNode.dataset.index)"></span>
                        <span class="dot" onclick="currentSlide(3, this.parentNode.parentNode.dataset.index)"></span>
                    </div>
                </div>   

                <p>Giubbino GS Minori <br>59,99€</p>
                <input type="hidden" name="product_image[]" value="photo_shop/giubbino_avanti.jpeg">
                <input type="hidden" name="product_name[]" value="Giubbino GS Minori">
                <input type="hidden" name="product_price[]" value="59.99">
                <div class="quantity-controls">
                    <button type="button" class="decrement">-</button>
                    <input type="number" class="quantity" name="quantity[]" value="0" min="0">
                    <button type="button" class="increment">+</button>
                </div>
            </div>


        </div>
        <button type="submit" id="confirmButton">Conferma</button>
    </form>

    <script src="shop.js" defer></script>
    <script src="slideshow.js" defer></script>
    <?php include 'footer.html'; ?>
</body>
</html>
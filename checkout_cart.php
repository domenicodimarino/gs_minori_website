<html>
<head>
    <title>GS Minori - Pagamento</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="checkout_cart.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://js.stripe.com/v3/"></script> <!-- caricamento di Stripe.js -->
</head>
<body>
    <?php include 'header.php'?>

    <?php
        if (isset($_COOKIE['cart'])) {
            $cart = unserialize($_COOKIE['cart']);
        } else {
            $cart = [];
        }
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        $cartItems = $cart;
        
    ?>
    <main>
    <h1>Pagamento</h1>
    <!-- Schermata di acquisizione dati dell'acquirente -->
    <form method="post" style="display: flex;" id="payment-form" action="order_completed.php">
        <h2> Il totale da pagare è di <?php echo $totalPrice; ?> € </h2>
            <section id="order_summary" class="buyer_form">
                <h1> Riepilogo ordine </h1>
                <p>
                    <ul id="resultsList">
                        <?php
                        foreach ($cartItems as $index => $item) {
                            $productName = isset($item['product_name']) ? htmlspecialchars($item['product_name']) : '';
                            $quantity = isset($item['quantity']) ? htmlspecialchars($item['quantity']) : '';
                            $price = isset($item['price']) ? htmlspecialchars($item['price']) : '';
                            echo "<li>" . $productName . " - Quantità: " . $quantity . " - Prezzo: €" . $price . "</li>";
                        }
                        ?>
                    </ul>
                </p>
            </section>
            <section id="buyer_data" class="buyer_form">
                <h1> Dati dell'acquirente </h1>
                <input type="number" id="importo" name="importo" value="<?php echo $totalPrice; ?>" readonly hidden>
                <?php
                foreach ($cartItems as $index => $item) {
                    $productName = isset($item['product_name']) ? htmlspecialchars($item['product_name']) : '';
                    $quantity = isset($item['quantity']) ? htmlspecialchars($item['quantity']) : '';
                    $price = isset($item['price']) ? htmlspecialchars($item['price']) : '';
                    echo '<input type="hidden" name="cartItems[' . $index . '][product_name]" value="' . $productName . '">';
                    echo '<input type="hidden" name="cartItems[' . $index . '][quantity]" value="' . $quantity . '">';
                    echo '<input type="hidden" name="cartItems[' . $index . '][price]" value="' . $price . '">';
                }
                ?>
                <p>
                <label for="nome">
                    Nome: <input type="text" id="nome" name="nome" required value="<?php echo isset($_SESSION["nome"]) ? $_SESSION['nome'] : ''; ?>" placeholder="Nome">
                </label>
                </p>
                <p>
                <label for="cognome">
                    Cognome: <input type="text" id="cognome" name="cognome" required value="<?php echo isset($_SESSION["cognome"]) ? $_SESSION['cognome'] : ''; ?>" placeholder="Cognome">
                </label>
                </p>
                <p id="sex_choice">
                    <label for="sesso">Sesso:</label>
                    <label> 
                        <input type="radio" name="sesso" value="M" required> Uomo
                    </label>
                    <label>
                        <input type="radio" name="sesso" value="F"> Donna
                    </label>
                    <label>
                        <input type="radio" name="sesso" value="Altro"> Altro
                    </label>
                </p>
                <p>
                    <label for="email">
                        Indirizzo email: <input type="email" id="email" name="email"  value="<?php echo isset($_SESSION["mail"]) ? $_SESSION['mail'] : ''; ?>" placeholder="Indirizzo email" required>
                    </label>
                </p>
                <p>
                    <label for="telefono">
                        Telefono: <input type="tel" id="telefono" name="telefono" placeholder="Numero di telefono">            
                    </label>
                </p>
                <p style="width:90%; margin-left:5%;">
                    <label for="residenza">
                        Indirizzo di residenza: <input type="text" id="residenza" name="residenza" placeholder="Indirizzo di residenza" required>
                        <img src="gps.png" onclick="getLocation()" style="cursor: pointer; margin-left:2px">
                    </label>
                </p>
                <p>
                    <label for="data">
                        Data di nascita: <input type="date" id="data" name="data" required>
                    </label>
                </p>
            </section>
            <section id="card_data" class="buyer_form">
                    <h1> Dati di pagamento </h1>
            </section>
            <div id="card-element">
            <!--Stripe.js injects the Payment Element-->
            </div>    
            <!-- Used to display Element errors. -->
            <div id="card-errors" role="alert"></div>
            </div>
            <p id="submit_button">
                <button id="submit-button">CONFERMA</button>
                <button id="back-button" type="button" onclick="window.location.href='cart.php'">INDIETRO</button>
            </p>       
        </form>
    </form>
    <script src="checkout.js"></script>
    </main>
    <?php include 'footer.html'?>
    <script src="geolocalizzazione.js"></script>
</body>
</html>
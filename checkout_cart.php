<?php require 'db.php'?>
<?php session_start()?>
<?php require 'required_login.php'?>
<html>
<head>
    <title>GS Minori - Pagamento</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="checkout_cart.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://js.stripe.com/v3/"></script> <!-- caricamento di Stripe.js -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <?php include 'header.php'?>
    <!-- Recupero del cookie del carrello -->
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
    <!-- Interfacciamento con il database per capire se i prodotti sono disponibili -->
    <?php
        // Viene verificata la disponibilità per ogni prodotto nel carrello
        foreach ($cartItems as $item) {
            $productName = pg_escape_string($db, $item['product_name']);
            $orderedQuantity = (int)$item['quantity'];

            // Si recupera la disponibilità attuale dal database
            $query = "SELECT available_quantity FROM product_inventory WHERE product_name = '$productName'";
            $result = pg_query($db, $query);
            if ($row = pg_fetch_assoc($result)) {
                $available = (int)$row['available_quantity'];
                if ($orderedQuantity > $available) {
                    die("Errore: per il prodotto '$productName' sono disponibili solo $available unità.");
                }
            } else {
                die("Errore: prodotto '$productName' non trovato in inventario.");
            }
        }
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
                    Nome: <br> <input type="text" id="nome" name="nome" required value="<?php echo isset($_SESSION["nome"]) ? $_SESSION['nome'] : ''; ?>" placeholder="Nome">
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
                        Telefono: <input type="tel" id="telefono" name="telefono" placeholder="Numero di telefono" pattern="\+?[0-9]{10,15}" required>            
                    </label>
                </p>
                <p >
                    <label for="residenza">
                        Indirizzo di residenza: <input type="text" id="residenza" name="residenza" placeholder="Indirizzo di residenza" required>
                        <i class="fa-solid fa-location-dot" onclick="getLocation()" style="cursor: pointer;"></i>
                    </label>
                </p>
                <p>
                <label for="data">
                        Data di nascita: <input type="date" id="data" name="data" required onchange="validateDate()">
                        <br>
                        <span id="date-error" style="color: red; display: none;">Devi avere almeno 18 anni.</span>
                        <script>
                            document.getElementById('data').addEventListener('change', validateDate);

                            function validateDate() {
                                const inputDate = new Date(document.getElementById('data').value);
                                const today = new Date();
                                let age = today.getFullYear() - inputDate.getFullYear();
                                const monthDifference = today.getMonth() - inputDate.getMonth();
                                const dayDifference = today.getDate() - inputDate.getDate();
                                
                                if (monthDifference < 0 || (monthDifference === 0 && dayDifference < 0)) {
                                    age--;
                                }

                                if (age < 18) {
                                    document.getElementById('date-error').style.display = 'inline';
                                    document.getElementById('submit-button').disabled = true;
                                } else {
                                    document.getElementById('date-error').style.display = 'none';
                                    document.getElementById('submit-button').disabled = false;
                                }
                            }
                        </script>
                    </label>
                </p>
            </section>
            <section id="card_data" class="buyer_form">
                    <h1> Dati di pagamento </h1>
            </section>
            <div id="card-element">
            <!--Stripe.js injects the Payment Element-->
            </div>    
            <!-- Usato per visualizzare a display gli errori. -->
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
<html>
<head>
    <title>GS Minori - Pagamento</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="checkout_cart.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include 'header.html'?>

    <!-- Controllo utente loggato -->
    <?php //DISATTIVATO PER TESTING
    /*
    session_start();
    
        L'elemento $_SESSION["username"] è popolato
        con l'username dell'utente solo se l'autenticazione è avvenuta con successo
    
    if(!isset($_SESSION["username"])){
        $current_url = urlencode($_SERVER['REQUEST_URI']);
        header("Location: login.php?redirect=$current_url");
        exit();
    }
    else{
        $user = $_SESSION["username"];
    }
        
    ?>*/
    ?>

    <h1>Pagamento</h1>
    <form action="process_payment.php" method="POST">
        <div class="form-group">
            <label for="cardNumber">Numero di Carta:</label>
            <input type="text" id="cardNumber" name="cardNumber" required>
        </div>
        <div class="form-group">
            <label for="cardName">Nome sulla Carta:</label>
            <input type="text" id="cardName" name="cardName" required>
        </div>
        <div class="form-group">
            <label for="expiryDate">Data di Scadenza:</label>
            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
        </div>
        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>
        </div>
        <button type="submit" class="confirm-order-button">Conferma Pagamento</button>
    </form>

    <?php include 'footer.html'?>
</body>
</html>
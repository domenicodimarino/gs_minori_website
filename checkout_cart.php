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

    <?php
    // Hidden input fields to pass data to checkout.php
    $totalPrice = $_POST['importo'];
    
    ?>

    <h1>Pagamento</h1>
    <form method="POST" id="payment-form">
            <div id="card-element">
                    <!--Stripe.js injects the Payment Element-->
            </div>
            
            <!-- Used to display Element errors. -->
            <div id="card-errors" role="alert"></div>

            <!-- NOME E COGNOME DI TEST PER CHECKOUT, DA MODIFICAREEEEE -->
             <input type="text" name="nome" id="nome" value="Default name" hidden>
             <input type="text" name="cognome" id="cognome" value="Default surname" hidden>

            <input type="number" name="importo" value="<?php echo $totalPrice; ?>" hidden>
        <input type="submit" class="confirm-order-button" id="submit-button" value="Conferma pagamento"></input>
    </form>
    <script src="checkout.js"></script>
    <?php include 'footer.html'?>
</body>
</html>
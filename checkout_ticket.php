<html>
    <head>
        <title>GS Minori - Checkout Ticket</title>
        <link rel = "stylesheet" href = "style.css" type = "text/css"/>
        <link rel="stylesheet" href="checkout_ticket.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <script src="https://js.stripe.com/v3/"></script>
    </head>
    <body>
        <?php include 'header.html'?>
        
        <main>
        
        <!-- Controllo utente loggato -->
        
        
        <?php 
        //DISATTIVATO PER TESTING

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

        <!-- Gestione match in array associativo -->
        <?php 
            $match["1"]="GS Minori - Farmacia Greco Portici 2000, 05 Marzo 2025 21:15";
			$match["2"]="GS Minori - Sammaritana Basket e Sport, 09 Marzo 2025 19:00";
			$match["3"]="GS Minori - DIESEL TECNICA SALA CONSILINA, 12 Marzo 2025 21:00";
            $match["4"]="GS Minori - CUS NAPOLI, 16 Marzo 2025 20:30";
            if(!isset($_GET['matchID'])){
				echo "Non hai selezionato nessun match.";
			}
			elseif(!array_key_exists($_GET['matchID'], $match)){
				echo "Il match selezionato non esiste.";
			}
			else {
				$matchID = $_GET['matchID'];
			}
        ?>

<?php 
            $sector["1"]="Tribuna ovest alta esterna";
            $sector["2"]="Tribuna ovest alta interna";
            $sector["3"]="Parterre ovest esterno";
            $sector["4"]="Parterre ovest interno";
            $sector["5"]="Parterre ovest centrale";
            $sector["6"]="Parterre ovest centralissimo";
            $sector["7"]="Tribuna est alta esterna";
            $sector["8"]="Tribuna est alta interna";
            $sector["9"]="Parterre est esterno";
            $sector["10"]="Parterre est interno";
            $sector["11"]="Curva nord";
            $sector["12"]="Curva sud";

            $sector_price["1"]=10;
            $sector_price["2"]=15;
            $sector_price["3"]=20;
            $sector_price["4"]=25;
            $sector_price["5"]=30;
            $sector_price["6"]=35;
            $sector_price["7"]=10;
            $sector_price["8"]=15;
            $sector_price["9"]=20;
            $sector_price["10"]=25;
            $sector_price["11"]=5;
            $sector_price["12"]=5;
        ?>

        <!-- Gestione pagina dopo conferma -->
        <?php 
            if(isset($_POST['numero_biglietti'])){
                $numero_biglietti = $_POST['numero_biglietti'];
                if($numero_biglietti > 0){
                    $total_price = 0;
                    for($i = 1; $i <= 12; $i++){
                        $total_price += $sector_price[$i] * $_POST['numero_biglietti'][$i];
                    }
                }
                
            }
        ?>


        <!-- Schermata di acquisizione dati dell'acquirente -->
        <form method="post" style="display: flex;" id="payment-form">
        <h2> Il totale da pagare è di <?php echo $total_price; ?> € </h2>
            <section id="order_summary" class="buyer_form">
                <h1> Riepilogo ordine </h1>
                <p>
                    <ul id="resultsList">
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <?php if($_POST['numero_biglietti'][$i] > 0): ?>
                                <li>
                                    <?php echo $sector[$i]; ?>: <?php echo $_POST['numero_biglietti'][$i]; ?> bigliett<?php echo $_POST['numero_biglietti'][$i] > 1 ? 'i' : 'o'; ?> = <?php echo $sector_price[$i] * $_POST['numero_biglietti'][$i]; ?> €
                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                </p>
            </section>
            <section id="buyer_data" class="buyer_form">
                <h1> Dati dell'acquirente </h1>
                <input type="hidden" name="importo" value="<?php echo $total_price; ?>" id="importo">
                <p>
                <label for="nome">
                    Nome: <input type="text" id="nome" name="nome" required value="<?php echo isset($_SESSION["name"]) ? $_SESSION['name'] : ''; ?>" placeholder="Nome">
                </label>
                </p>
                <p>
                <label for="cognome">
                    Cognome: <input type="text" id="cognome" name="cognome" required value="<?php echo isset($_SESSION["surname"]) ? $_SESSION['surname'] : ''; ?>" placeholder="Cognome">
                </label>
                </p>
                <p id="sex_choice">
                    <label for="sesso">Sesso:</label>
                    <label> 
                        <input type="radio" name="sesso" value="M" > Uomo
                    </label>
                    <label>
                        <input type="radio" name="sesso" value="F" > Donna
                    </label>
                    <label>
                        <input type="radio" name="sesso" value="Altro" > Altro
                    </label>
                </p>
                <p>
                    <label for="email">
                        Indirizzo email: <input type="email" id="email" name="email"  value="<?php echo isset($_SESSION["email"]) ? $_SESSION['email'] : ''; ?>" placeholder="Indirizzo email">
                    </label>
                </p>
                <p>
                    <label for="telefono">
                        Telefono: <input type="tel" id="telefono" name="telefono"  value="<?php echo isset($_SESSION["phone"]) ? $_SESSION['phone'] : ''; ?>" placeholder="Numero di telefono">            
                    </label>
                </p>
                <p>
                    <label for="residenza">
                        Indirizzo di residenza: <input type="text" id="residenza" name="residenza"  value="<?php echo isset($_SESSION["name"]) ? $_SESSION['name'] : ''; ?>" placeholder="Indirizzo di residenza">
                    </label>
                </p>
                <p>
                    <label for="data">
                        Data di nascita: <input type="date" id="data" name="data" >
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
            </section>
            <p id="submit_button">
                <button id="submit-button">CONFERMA</button>
            </p>       
        </form>
        <script src="checkout.js">
        </script>
        </main>
        
        <?php include 'footer.html'?>
            
</html>
<?php session_start();
if(isset($_SESSION['last_ticket_id']))
    unset($_SESSION['last_ticket_id']);
?>
<html>
    <head>
        <title>GS Minori - Checkout Ticket</title>
        <link rel = "stylesheet" href = "style.css" type = "text/css"/>
        <link rel="stylesheet" href="checkout_ticket.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <script src="https://js.stripe.com/v3/"></script>
    </head>
    <body>  
    <?php include 'header.php'?>
        <main>

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
        <form method="post" style="display: flex;" id="payment-form" action="ticket_completed.php">
            <h1>Termina il tuo pagamento qui: <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'utente'; ?></h1>
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
                <input type="number" id="matchID" name="matchID" value="<?php echo $matchID; ?>" readonly hidden>
                <input type="text" id="match" name="match" value="<?php echo $match[$matchID]; ?>" readonly hidden>
                <input type="number" id="importo" name="importo" value="<?php echo $total_price; ?>" readonly hidden>

                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <?php if($_POST['numero_biglietti'][$i] > 0): ?>
                        <input type="text" id="settore_<?php echo $i; ?>" name="settore[<?php echo $i; ?>]" value="<?php echo $sector[$i]; ?>" readonly hidden>
                        <input type="number" id="numero_biglietti_<?php echo $i; ?>" name="numero_biglietti[<?php echo $i; ?>]" value="<?php echo $_POST['numero_biglietti'][$i]; ?>" readonly hidden>
                        <input type="number" id="prezzo_<?php echo $i; ?>" name="prezzo[<?php echo $i; ?>]" value="<?php echo $sector_price[$i]; ?>" readonly hidden>
                    <?php endif; ?>
                <?php endfor; ?>
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
                        <input type="radio" name="sesso" value="F" > Donna
                    </label>
                    <label>
                        <input type="radio" name="sesso" value="Altro" > Altro
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
                <p>
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
                <button id="back-button" type="button" onclick="window.location.href='choose_ticket.php?matchID=<?php echo $matchID; ?>'">INDIETRO</button>
            </p>       
        </form>
        <script src="checkout.js"></script>   
        </main>
        <?php include 'footer.html'?>
        <script src="geolocalizzazione.js"></script>
    </body>
</html>
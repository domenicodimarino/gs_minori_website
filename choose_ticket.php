<?php session_start();
    if(isset($_SESSION['last_ticket_id']))
        unset($_SESSION['last_ticket_id']);
?>
<html>
<head>
        <title>GS Minori - Scelta del settore</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="choose_ticket.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body>
        <?php include 'header.php'?>
        
        <?php require 'required_login.php'?>
        
        
        
        
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
        
        <!-- Gestione settori in array associativo -->
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

        <?php
            // Connessione al database PostgreSQL
            $conn = pg_connect("host=localhost dbname=gruppo01 user=www password=tw2024");
            if (!$conn) {
                die("Errore nella connessione al database.");
            }
        ?>
        

        <script language="javascript" type="text/javascript">
        function increase_number(id){
            var tickets = document.getElementById("tickets" + id);
            var tickets_number = parseInt(tickets.value);
            var max_tickets = parseInt(tickets.max);
            if (tickets_number < max_tickets) {
                tickets_number++;
                tickets.value = tickets_number;
            }
        }
        function decrease_number(id){
            var tickets = document.getElementById("tickets" + id);
            var tickets_number = parseInt(tickets.value);
            if(tickets_number > 0){
                tickets_number--;
                tickets.value = tickets_number;
            }
        }

        function check_ticket_data(elementoModulo) {
            var tickets_number = 0;
            for (var i = 1; i <= 12; i++) {
                var tickets = document.getElementById("tickets" + i);
                tickets_number += parseInt(tickets.value);
            }
            if(tickets_number > 0){
                return true;
            }
            else{
                alert("Devi selezionare almeno un biglietto per proseguire");
                return false;
            }
        }
    </script>


        <main>
        <h1>Seleziona i tuoi biglietti</h1>
        <p>Match selezionato: <?php echo $match[$matchID] ?></p>
        <p>Scegli il numero di biglietti per ciascun settore (massimo in base alla disponibilità):</p>

        <section class="initial_view" id="initial_view">
            <figure>
                <img src="photo_ticket/piantina.jpeg" alt="Piantina palazzetto con settori">
            </figure>
            <section class="sector_choice">
                <p class="sector_type">
                    <strong>SETTORE</strong>
                </p>
                <p class="tickets_number">
                    <strong>NUMERO DI BIGLIETTI</strong>
                </p>
                <p class="ticket_price">
                    <strong>PREZZO</strong>
                </p>
            </section>
            <form action="checkout_ticket.php?matchID=<?php echo $matchID?>" method="post">
                <?php
                // Per ogni settore, recupera e mostra la disponibilità
                for ($i = 1; $i <= 12; $i++):
                    // Query per ottenere la disponibilità per il settore e il match specificato
                    $query = "SELECT available_quantity FROM ticket_availability WHERE match_id = $matchID AND sector_id = $i";
                    $result = pg_query($conn, $query);
                    $row = pg_fetch_assoc($result);
                    // Se non troviamo la riga, assumiamo disponibilità pari a 0
                    $availability = ($row && isset($row['available_quantity'])) ? $row['available_quantity'] : 0;
                ?>
                    <section class="sector_choice">
                        <p class="sector_type">
                            <?php echo $sector[$i]; ?>
                        </p>
                        <p class="tickets_number">
                            <img src="minus_button.png" id="minus<?php echo $i; ?>" onclick="decrease_number(<?php echo $i; ?>)" style="margin-right: 30px" class="minus_button">
                            <input type="number" name="numero_biglietti[<?php echo $i; ?>]" min="0" max="<?php echo $availability; ?>" id="tickets<?php echo $i; ?>" value="0" readonly>
                            <img src="plus_button.png" id="plus<?php echo $i; ?>" onclick="increase_number(<?php echo $i; ?>)" style="margin-left:30px" class="plus_button">
                        </p>
                        <p class="ticket_price">
                            <?php echo $sector_price[$i]; ?> €
                        </p>
                        <p class="availability">
                            Biglietti disponibili: <?php echo $availability; ?>
                        </p>
                    </section>
                <?php endfor; ?>  
                <input type="submit" value="CONFERMA" onclick="return check_ticket_data(this.form)" id="submit-button">
            </form>
        </section>
    </main>
        <?php include 'footer.html'?>
    </body>
</html>
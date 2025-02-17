<html>
<head>
        <title>GS Minori - Scelta del settore</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="choose_ticket.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

        <script language="javascript" type="text/javascript">
            function increase_number(id){
                switch(id){
                    case "plus1":
                        var tickets = document.getElementById("tickets1");
                        var tickets_number = parseInt(tickets.value);
                        tickets_number++;
                        tickets.value = tickets_number;
                        break;
                    case "plus2":
                        var tickets = document.getElementById("tickets2");
                        var tickets_number = parseInt(tickets.value);
                        tickets_number++;
                        tickets.value = tickets_number;
                        break;
                    case "plus3":
                        var tickets = document.getElementById("tickets3");
                        var tickets_number = parseInt(tickets.value);
                        tickets_number++;
                        tickets.value = tickets_number;
                        break;
                    case "plus4":
                        var tickets = document.getElementById("tickets4");
                        var tickets_number = parseInt(tickets.value);
                        tickets_number++;
                        tickets.value = tickets_number;
                        break;
                    case "plus5":
                        var tickets = document.getElementById("tickets5");
                        var tickets_number = parseInt(tickets.value);
                        tickets_number++;
                        tickets.value = tickets_number;
                        break;
                    case "plus6":
                        var tickets = document.getElementById("tickets6");
                        var tickets_number = parseInt(tickets.value);
                        tickets_number++;
                        tickets.value = tickets_number;
                        break;
                    case "plus7":
                        var tickets = document.getElementById("tickets7");
                        var tickets_number = parseInt(tickets.value);
                        tickets_number++;
                        tickets.value = tickets_number;
                        break;
                    case "plus8":
                        var tickets = document.getElementById("tickets8");
                        var tickets_number = parseInt(tickets.value);
                        tickets_number++;
                        tickets.value = tickets_number;
                        break;
                    case "plus9":
                        var tickets = document.getElementById("tickets9");
                        var tickets_number = parseInt(tickets.value);
                        tickets_number++;
                        tickets.value = tickets_number;
                        break;
                    case "plus10":
                        var tickets = document.getElementById("tickets10");
                        var tickets_number = parseInt(tickets.value);
                        tickets_number++;
                        tickets.value = tickets_number;
                        break;
                    case "plus11":
                        var tickets = document.getElementById("tickets11");
                        var tickets_number = parseInt(tickets.value);
                        tickets_number++;
                        tickets.value = tickets_number;
                        break;
                    case "plus12":
                        var tickets = document.getElementById("tickets12");
                        var tickets_number = parseInt(tickets.value);
                        tickets_number++;
                        tickets.value = tickets_number;
                        break;
                }
            }
            function decrease_number(id){
                switch(id){
                    case "minus1":
                        var tickets = document.getElementById("tickets1");
                        var tickets_number = parseInt(tickets.value);
                        if(tickets_number > 0){
                            tickets_number--;
                            tickets.value = tickets_number;
                        }
                        break;
                    case "minus2":
                        var tickets = document.getElementById("tickets2");
                        var tickets_number = parseInt(tickets.value);
                        if(tickets_number > 0){
                            tickets_number--;
                            tickets.value = tickets_number;
                        }
                        break;
                    case "minus3":
                        var tickets = document.getElementById("tickets3");
                        var tickets_number = parseInt(tickets.value);
                        if(tickets_number > 0){
                            tickets_number--;
                            tickets.value = tickets_number;
                        }
                        break;
                    case "minus4":
                        var tickets = document.getElementById("tickets4");
                        var tickets_number = parseInt(tickets.value);
                        if(tickets_number > 0){
                            tickets_number--;
                            tickets.value = tickets_number;
                        }
                        break;
                    case "minus5":
                        var tickets = document.getElementById("tickets5");
                        var tickets_number = parseInt(tickets.value);
                        if(tickets_number > 0){
                            tickets_number--;
                            tickets.value = tickets_number;
                        }
                        break;
                    case "minus6":
                        var tickets = document.getElementById("tickets6");
                        var tickets_number = parseInt(tickets.value);
                        if(tickets_number > 0){
                            tickets_number--;
                            tickets.value = tickets_number;
                        }
                        break;
                    case "minus7":
                        var tickets = document.getElementById("tickets7");
                        var tickets_number = parseInt(tickets.value);
                        if(tickets_number > 0){
                            tickets_number--;
                            tickets.value = tickets_number;
                        }
                        break;
                    case "minus8":
                        var tickets = document.getElementById("tickets8");
                        var tickets_number = parseInt(tickets.value);
                        if(tickets_number > 0){
                            tickets_number--;
                            tickets.value = tickets_number;
                        }
                        break;
                    case "minus9":
                        var tickets = document.getElementById("tickets9");
                        var tickets_number = parseInt(tickets.value);
                        if(tickets_number > 0){
                            tickets_number--;
                            tickets.value = tickets_number;
                        }
                        break;
                    case "minus10":
                        var tickets = document.getElementById("tickets10");
                        var tickets_number = parseInt(tickets.value);
                        if(tickets_number > 0){
                            tickets_number--;
                            tickets.value = tickets_number;
                        }
                        break;
                    case "minus11":
                        var tickets = document.getElementById("tickets11");
                        var tickets_number = parseInt(tickets.value);
                        if(tickets_number > 0){
                            tickets_number--;
                            tickets.value = tickets_number;
                        }
                        break;
                    case "minus12":
                        var tickets = document.getElementById("tickets12");
                        var tickets_number = parseInt(tickets.value);
                        if(tickets_number > 0){
                            tickets_number--;
                            tickets.value = tickets_number;
                        }
                        break;
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
            Match selezionato: <?php echo $match[$matchID] ?>

            <!-- Schermata di scelta dei biglietti -->
            
            <section class = "initial_view" id="initial_view">
                    <figure>
                        <img src="photo_ticket/piantina.jpeg" alt="Piantina palazzetto con settori">
                    </figure>
                    <section class = "sector_choice">
                        <p class = "sector_type">
                            <strong>SETTORE</strong>
                        </p>
                        <p class = "tickets_number">
                            <strong>NUMERO DI BIGLIETTI</strong>
                        </p>
                        <p class = "ticket_price">
                            <strong>PREZZO</strong>
                        </p>
                    </section>
                    <form action="checkout_ticket.php?matchID=<?php echo $matchID?>" method="post">
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <section class="sector_choice">
                                <p class="sector_type">
                                    <?php echo $sector[$i]; ?>
                                </p>
                                <p class="tickets_number">
                                    <img src="minus_button.png" id="minus<?php echo $i; ?>" onclick="decrease_number(this.id)" style="margin-right: 30px" class="minus_button">
                                    <input type="number" name="numero_biglietti[<?php echo $i; ?>]" min="0" id="tickets<?php echo $i; ?>" value="<?php echo isset($_POST['numero_biglietti'][$i]) ? $_POST['numero_biglietti'][$i] : 0; ?>" readonly>
                                    <img src="plus_button.png" id="plus<?php echo $i; ?>" onclick="increase_number(this.id)" style="margin-left:30px" class="plus_button">
                                </p>
                                <p class="ticket_price">
                                    <?php echo $sector_price[$i]; ?> €
                                </p>
                            </section>
                        <?php endfor; ?>  
                        <input type="number" name="importo" value="<?php echo $total_price; ?>" id="importo" style="display: none;">
                        <input type="submit" value="CONFERMA" onclick="return check_ticket_data(this.form)" id="submit-button">
                    </form>
                </section>

        </main>
        <?php include 'footer.html'?>
    </body>
</html>
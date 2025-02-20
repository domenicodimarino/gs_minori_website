// SOLUZIONE DOM

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
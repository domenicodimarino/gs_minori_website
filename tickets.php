<?php session_start();
    if(isset($_SESSION['last_ticket_id']))
        unset($_SESSION['last_ticket_id']);
?>
<html>
    <head>
        <title>GS Minori - Sito ufficiale</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="tickets.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
    </head>
    <body>
        <?php include 'header.php'?>

        <!-- Gestione match in array associativo -->
         <?php 
            $match1 = array ("data"=>"05 Marzo 2025 21:15", "match"=>"GS Minori - Farmacia Greco Portici 2000");
            $match2 = array ("data"=>"09 Marzo 2025 19:00", "match"=>"GS Minori - Sammaritana Basket e Sport");
            $match3 = array ("data"=>"12 Marzo 2025 21:00", "match"=>"GS Minori - DIESEL TECNICA SALA CONSILINA");
            $match4 = array ("data"=>"16 Marzo 2025 19:00", "match"=>"GS Minori - CUS NAPOLI");

             // Connessione al database PostgreSQL
             $conn = pg_connect("host=localhost dbname=gruppo01 user=www password=tw2024");
             if (!$conn) {
                 die("Errore nella connessione al database.");
             }
 
             // Esempio per il match con match_id = 1 (ripeti per gli altri match o generalizza in base alla logica)
             $query1 = "SELECT SUM(available_quantity) AS total_available FROM ticket_availability WHERE match_id = 1";
             $result1 = pg_query($conn, $query1);
             $row1 = pg_fetch_assoc($result1);
             $total_available1 = $row1['total_available'];
 
             $query2 = "SELECT SUM(available_quantity) AS total_available FROM ticket_availability WHERE match_id = 2";
             $result2 = pg_query($conn, $query2);
             $row2 = pg_fetch_assoc($result2);
             $total_available2 = $row2['total_available'];
 
             $query3 = "SELECT SUM(available_quantity) AS total_available FROM ticket_availability WHERE match_id = 3";
             $result3 = pg_query($conn, $query3);
             $row3 = pg_fetch_assoc($result3);
             $total_available3 = $row3['total_available'];
 
             $query4 = "SELECT SUM(available_quantity) AS total_available FROM ticket_availability WHERE match_id = 4";
             $result4 = pg_query($conn, $query4);
             $row4 = pg_fetch_assoc($result4);
             $total_available4 = $row4['total_available'];
          
         ?>
        
        <main>
            <h1>Biglietti</h1>
              
                <section class="all_tickets">
                    <div class="info">Acquista subito i tuoi biglietti per le partite del GS Minori!</div>                
                    <section class="ticket_section">
                        <p class="data_match">
                            <?php echo $match1["data"] ?>
                        </p>
                        <p class="match">
                        <img src="photo/photo_ticket/gsminori_logo_M.jpg" alt="logo GS Minori" class="team_logo">
                            <?php echo $match1["match"] ?>
                            <img src="photo/photo_ticket/opponents_logo/portici2000.png" alt="logo Portici 2000" class="team_logo">
                        </p>
                        <p class="availability">
                            Biglietti disponibili: <br> <?php echo $total_available1; ?>
                        </p>
                        <a href="choose_ticket.php?matchID=1" class="ticket_button">Acquista</a>
                    </section>
                    <section class="ticket_section">
                        <p class="data_match">
                            <?php echo $match2["data"] ?>
                        </p>
                        <p class="match">
                        <img src="photo/photo_ticket/gsminori_logo_M.jpg" alt="logo GS Minori" class="team_logo">
                            <?php echo $match2["match"] ?>
                        <img src="photo/photo_ticket/opponents_logo/sammaritana.jpeg" alt="logo Sammaritana" class="team_logo">
                        </p>
                        <p class="availability">
                            Biglietti disponibili: <br><?php echo $total_available2; ?>
                        </p>
                        <a href="choose_ticket.php?matchID=2" class="ticket_button">Acquista</a>
                    </section>
                    <section class="ticket_section">
                        <p class="data_match">
                           <?php echo $match3["data"] ?>
                        </p>
                        <p class="match">
                        <img src="photo/photo_ticket/gsminori_logo_M.jpg" alt="logo GS Minori" class="team_logo">
                            <?php echo $match3["match"] ?>
                        <img src="photo/photo_ticket/opponents_logo/consilina.png" alt="logo Sala Consilina" class="team_logo">
                        </p>
                        <p class="availability">
                            Biglietti disponibili: <br><?php echo $total_available3; ?>
                        </p>
                        <a href="choose_ticket.php?matchID=3" class="ticket_button">Acquista</a>
                    </section>
                    <section class="ticket_section">
                        <p class="data_match">
                            <?php echo $match4["data"] ?>
                        </p>
                        <p class="match">
                        <img src="photo/photo_ticket/gsminori_logo_M.jpg" alt="logo GS Minori" class="team_logo">
                            <?php echo $match4["match"] ?>
                        <img src="photo/photo_ticket/opponents_logo/cusnapoli.png" alt="logo CUS Napoli" class="team_logo">
                        </p>
                        <p class="availability">
                            Biglietti disponibili: <br> <?php echo $total_available4; ?>
                        </p>
                        <a href="choose_ticket.php?matchID=4" class="ticket_button">Acquista</a>
                    </section>
                </section>
        </main>
        <?php include 'footer.html'?>
    </body>
    
</html>
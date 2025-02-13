<html>
    <head>
        <title>GS Minori - Sito ufficiale</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="tickets.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body>
        <?php include 'header.html'?>

        <!-- Gestione match in array associativo -->
         <?php 
            $match1 = array ("data"=>"05 Marzo 2025 21:15", "match"=>"GS Minori - Farmacia Greco Portici 2000");
            $match2 = array ("data"=>"09 Marzo 2025 19:00", "match"=>"GS Minori - Sammaritana Basket e Sport");
            $match3 = array ("data"=>"12 Marzo 2025 21:00", "match"=>"GS Minori - DIESEL TECNICA SALA CONSILINA");
            $match4 = array ("data"=>"16 Marzo 2025 19:00", "match"=>"GS Minori - CUS NAPOLI");
         ?>
        
        <main>
            <h1>Biglietti</h1>
                <figure>
                    <img id="tickets_photo" src="tickets.jpg" alt="tickets">
                </figure>
                <section class="all_tickets">
                    Di seguito sono elencati i biglietti disponibili per l'acquisto.
                    <section class="ticket_section">
                        <p class="data_match">
                            <?php echo $match1["data"] ?>
                        </p>
                        <p class="match">
                        <img src="gsminori_logo_M.jpg" alt="logo GS Minori" class="team_logo">
                            <?php echo $match1["match"] ?>
                            <img src="opponents_logo/portici2000.png" alt="logo Portici 2000" class="team_logo">
                        </p>
                        <a href="choose_ticket.php?matchID=1" class="ticket_button">>></a>
                    </section>
                    <section class="ticket_section">
                        <p class="data_match">
                            <?php echo $match2["data"] ?>
                        </p>
                        <p class="match">
                        <img src="gsminori_logo_M.jpg" alt="logo GS Minori" class="team_logo">
                            <?php echo $match2["match"] ?>
                        <img src="opponents_logo/sammaritana.jpeg" alt="logo Sammaritana" class="team_logo">
                        </p>
                        <a href="choose_ticket.php?matchID=2" class="ticket_button">>></a>
                    </section>
                    <section class="ticket_section">
                        <p class="data_match">
                           <?php echo $match3["data"] ?>
                        </p>
                        <p class="match">
                        <img src="gsminori_logo_M.jpg" alt="logo GS Minori" class="team_logo">
                            <?php echo $match3["match"] ?>
                        <img src="opponents_logo/consilina.png" alt="logo Sala Consilina" class="team_logo">
                        </p>
                        <a href="choose_ticket.php?matchID=3" class="ticket_button">>></a>
                    </section>
                    <section class="ticket_section">
                        <p class="data_match">
                            <?php echo $match4["data"] ?>
                        </p>
                        <p class="match">
                        <img src="gsminori_logo_M.jpg" alt="logo GS Minori" class="team_logo">
                            <?php echo $match4["match"] ?>
                        <img src="opponents_logo/cusnapoli.png" alt="logo CUS Napoli" class="team_logo">
                        </p>
                        <a href="choose_ticket.php?matchID=4" class="ticket_button">>></a>
                    </section>
                </section>
        </main>
        <?php include 'footer.html'?>
    </body>
    
</html>
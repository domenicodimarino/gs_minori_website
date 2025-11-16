<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagione - G.S. Minori</title>
    <link rel="stylesheet" href="stagione.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'?>

    <main>
        <section class="calendario">
            <div class="partita">
                <h2>Prossima Partita</h2>
                <div id="prossima-partita">
                    <!-- I dati della prossima partita verranno caricati qui -->
                </div>
                <button id="prevMatch" disabled>Precedente Partita</button>
                <button id="nextMatch">Prossima Partita</button>
            </div>
        </section>
        <section class="classifica">
        <h1 id="classifica">Classifica Divisione Regionale 2 Girone B</h1>
        <h2> <a href="https://www.playbasket.it/campania/league.php?lt=2&lf=M&lr=CM&lp=NA&lc=DR2&season=2025&subj=1&mod=st&lg=2">Fonte: PlayBasket</a></h2>
        </section>
        <div id="table-container">Caricamento in corso...</div>
        <section class="classifica" style="width: 386px;">
        <h1>Legenda</h1>
        </section>
        <section id="legenda-container">
        <ul id="legenda"> 
            <li><strong>P.ti :</strong> punti</li>
            <li><strong>P.ti/P :</strong> Rapporto punti / partite giocate</li>
            <li><strong>G:</strong> Partite giocate</li>
            <li><strong>V:</strong> Partite vinte</li>
            <li><strong>P:</strong> Partite perse</li>
            <li><strong>%:</strong> Percentuale vittorie</li>
            <li><strong>S:</strong> Striscia vittorie/sconfitte</li>
            <li><strong>PF:</strong> Punti fatti</li>
            <li><strong>PS:</strong> Punti subiti</li>
            <li><strong>Q:</strong> Rapporto punti fatti / punti subiti</li>
            <li><strong>PF/P:</strong> Rapporto punti fatti / partite giocate</li>
            <li><strong>PS/P:</strong> Rapporto punti subiti / partite giocate</li>
        </ul>
        </section>
        <script src="dynamic_leaderboard.js">
        </script>

    </main>
    <script>const BASE_PROXY_PATH = 'proxy.php';</script>
    <script src="stagione.js"></script>

    <!-- Footer -->
    <?php include 'footer.html'?>
</body>
</html>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagione - G.S. Minori</title>
    <link rel="stylesheet" href="stagione.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'?>

    <main>
        <h1 id="calendario">Calendario delle Partite</h1>
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

        <h1 id="classifica">Classifica del Campionato</h1>
        <section class="classifica">
            <table>
                <thead>
                    <tr>
                        <th>Posizione</th>
                        <th>Squadra</th>
                        <th>Punti</th>
                        <th><a href="https://fip.it/risultati/?group=campionati-regionali&regione_codice=CM&comitato_codice=RCM&sesso=M&codice_campionato=PM&codice_fase=1&codice_girone=66493"><i class="fas fa-info-circle"></a></i></th>
                    </tr>
                </thead>
                <tbody id="classifica-body">
                    <!-- I dati della classifica verranno caricati qui -->
                </tbody>
            </table>
        </section>

        <h1>Classifica da PlayBasket</h1>
        
        <div id="table-container">Caricamento in corso...</div>
        <h1>Legenda</h1>
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
    <script src="stagione.js"></script>

    <!-- Footer -->
    <?php include 'footer.html'?>
</body>
</html>
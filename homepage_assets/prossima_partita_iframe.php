<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prossima Partita</title>
    <link rel="stylesheet" href="partita_iframe.css">
</head>
<body>
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
    <script src="homepage_nextmatch.js"></script>
</body>
</html>
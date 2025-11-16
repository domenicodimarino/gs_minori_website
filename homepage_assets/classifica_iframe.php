<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classifica</title>
    <link rel="stylesheet" href="classifica_iframe.css">
</head>
<body>
    <section class="classifica">
        <h1>Classifica</h1>
        <div id="table-container">Caricamento in corso...</div>
    </section>

    <script>const BASE_PROXY_PATH = '../proxy.php';</script>

    <script src="../dynamic_leaderboard.js"></script>
    <script src="filtra_classifica.js"></script>
</body>
</html>
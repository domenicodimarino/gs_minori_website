<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GS Minori - Ticket Completed</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="ticket_completed.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
    <h1>Pagamento Completato</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $matchID = $_GET['matchID'];
        $importo = $_GET['importo'];
        $nome = $_GET['nome'];
        $cognome = $_GET['cognome'];
        $sesso = $_GET['sesso'];
        $email = $_GET['email'];
        $telefono = $_GET['telefono'];
        $residenza = $_GET['residenza'];
        $data = $_GET['data'];

        // Riformatta la data nel formato giorno, mese, anno
        $date = DateTime::createFromFormat('Y-m-d', $data);
        $formattedDate = $date->format('d-m-Y');

        echo "<section id='buyer_data'>";
        echo "<h2>Riepilogo ordine</h2>";
        echo "<p>Match ID: " . htmlspecialchars($matchID) . "</p>";
        echo "<p>Importo: €" . number_format($importo, 2, ',', '.') . "</p>";
        echo "<p>Nome: " . htmlspecialchars($nome) . "</p>";
        echo "<p>Cognome: " . htmlspecialchars($cognome) . "</p>";
        echo "<p>Sesso: " . htmlspecialchars($sesso) . "</p>";
        echo "<p>Email: " . htmlspecialchars($email) . "</p>";
        echo "<p>Telefono: " . htmlspecialchars($telefono) . "</p>";
        echo "<p>Residenza: " . htmlspecialchars($residenza) . "</p>";
        echo "<p>Data di nascita: " . htmlspecialchars($formattedDate) . "</p>";
        echo "</section>";

        // Visualizza i biglietti acquistati
        echo "<section id='order_summary'>";
        echo "<h2>Biglietti acquistati</h2>";
        echo "<ul>";
        foreach ($_GET['settore'] as $i => $settore) {
            $numero_biglietti = $_GET['numero_biglietti'][$i];
            echo "<li>" . htmlspecialchars($settore) . ": " . htmlspecialchars($numero_biglietti) . " bigliett" . ($numero_biglietti > 1 ? 'i' : 'o') . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Errore durante il recupero dei dati dell'ordine.</p>";
    }
        echo "</section>"
    ?>
    </main>
    <?php include 'footer.html'; ?>
</body>
</html>
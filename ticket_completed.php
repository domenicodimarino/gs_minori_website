<?php include 'header.php'; ?>
<?php require 'db.php'?>

<?php foreach ($_GET['settore'] as $i => $settore) {
            $numero_biglietti = $_GET['numero_biglietti'][$i];
            $sector_id = $i;
            $matchID = $_GET['matchID'];
            $query = "SELECT available_quantity FROM ticket_availability WHERE match_id = $matchID AND sector_id = $sector_id";
            $result = pg_query($db, $query);
            $row = pg_fetch_assoc($result);
            $available = $row['available_quantity'];

            if ($numero_biglietti > $available) {
                die("Errore: i biglietti richiesti per il settore $i superano la disponibilità ($available rimasti).");
            } else {
                // Aggiorna la disponibilità: sottrai i biglietti acquistati
                $nuovaDisponibilita = $available - $numero_biglietti;
                $updateQuery = "UPDATE ticket_availability SET available_quantity = $nuovaDisponibilita 
                                WHERE match_id = $matchID AND sector_id = $sector_id";
                $updateResult = pg_query($db, $updateQuery);
                if (!$updateResult) {
                    die("Errore durante l'aggiornamento della disponibilità per il settore $sector_id.");
                }
            }}?>

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
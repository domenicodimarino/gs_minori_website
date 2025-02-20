<?php require 'db.php'?>
<?php include 'header.php'; ?>
<?php 
    
    if(isset($_SESSION['last_ticket_id'])) {
    $orderId = $_SESSION['last_ticket_id'];
    $queryGetTotal = "SELECT total_price FROM orders WHERE order_id = $orderId";
    $resultTotal = pg_query($db, $queryGetTotal);

    if ($resultTotal && $rowTotal = pg_fetch_assoc($resultTotal)) {
        $totalPrice = $rowTotal['total_price'];
    } else {
        die("Errore nel recupero del totale dell'ordine.");
    }

    $queryGetDetails = "SELECT p.product_name, od.quantity, od.price 
                        FROM order_details od
                        JOIN ticket_availability t ON od.product_id = t.sector_id
                        WHERE od.order_id = $orderId";
    $resultDetails = pg_query($db, $queryGetDetails);

    if (!$resultDetails) {
        die("Errore nel recupero dei dettagli dell'ordine.");
    }
}else{
    pg_query($db, "BEGIN");

    $username = $_SESSION['username'];

    $queryOrder = "INSERT INTO orders (user_name, total_price, order_date) VALUES ('$username', 0, NOW()) RETURNING order_id";
    $resultOrder = pg_query($db, $queryOrder);

    if (!$resultOrder) {
        pg_query($db, "ROLLBACK");
        die("Errore nella creazione dell'ordine.");
    }
    
    $orderRow = pg_fetch_assoc($resultOrder);
    $orderId = $orderRow['order_id'];
    $_SESSION['last_ticket_id'] = $orderId;  

    $totalPrice = 0;
    
    
    foreach ($_GET['settore'] as $i => $settore) {
        $numero_biglietti = $_GET['numero_biglietti'][$i];
        $sector_id = $i;
        $matchID = $_GET['matchID'];
        $price = $_GET['prezzo'][$i];
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


                $sector_name = $_GET['settore'][$i];
                $queryDetail = "INSERT INTO order_details (order_id, product_id, quantity, price) 
                VALUES ($orderId, (SELECT product_id FROM product_inventory WHERE product_name = '$sector_name'), $numero_biglietti, $price)";
                $detailResult = pg_query($db, $queryDetail);
    
                if (!$detailResult) {
                    pg_query($db, "ROLLBACK");
                    die("Errore nell'inserimento dei dettagli dell'ordine per '$sector_name'.");
                }
    
                $totalPrice += $numero_biglietti * $price;
            }
        }
}
// Se tutto è andato a buon fine, conferma la transazione
$queryUpdateTotal = "UPDATE orders SET total_price = $totalPrice WHERE order_id = $orderId";
    $updateTotalResult = pg_query($db, $queryUpdateTotal);

    if (!$updateTotalResult) {
        pg_query($db, "ROLLBACK");
        die("Errore nell'aggiornamento del totale dell'ordine.");
    }

    pg_query($db, "COMMIT");

}?>



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
<?php require 'db.php'?>
<?php 
session_start();
// Recupera il carrello dal cookie

if(isset($_SESSION['last_order_id']) && isset($_COOKIE['cart'])) {
    unset($_SESSION['last_order_id']);}

if(isset($_SESSION['last_order_id'])) {
    $orderId = $_SESSION['last_order_id'];
    $queryGetTotal = "SELECT total_price FROM orders WHERE order_id = $orderId";
    $resultTotal = pg_query($db, $queryGetTotal);

    if ($resultTotal && $rowTotal = pg_fetch_assoc($resultTotal)) {
        $totalPrice = $rowTotal['total_price'];
    } else {
        die("Errore nel recupero del totale dell'ordine.");
    }

    $queryGetDetails = "SELECT p.product_name, od.quantity, od.price 
                        FROM order_details od
                        JOIN product_inventory p ON od.product_id = p.product_id
                        WHERE od.order_id = $orderId";
    $resultDetails = pg_query($db, $queryGetDetails);

    if (!$resultDetails) {
        die("Errore nel recupero dei dettagli dell'ordine.");
    }

    $cartItems = [];
    while ($row = pg_fetch_assoc($resultDetails)) {
        $cartItems[] = $row;
    }
}
else {
// Avvia una transazione per assicurarti che tutti gli aggiornamenti siano atomici

    if (isset($_COOKIE['cart'])) {
        $cartItems = unserialize($_COOKIE['cart']);
    } else {
        die("Nessun prodotto nel carrello.");
    }

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
    $_SESSION['last_order_id'] = $orderId;  

    $totalPrice = 0;

    foreach ($cartItems as $item) {
        // Assicurati che il nome del prodotto e la quantità siano presenti
        if (!isset($item['product_name']) || !isset($item['quantity'])) {
            continue;
        }
        
        $productName = pg_escape_string($db, $item['product_name']);
        $orderedQuantity = (int)$item['quantity'];
        $price = (float)$item['price'];

        // Recupera la quantità attuale disponibile per questo prodotto
        $query = "SELECT available_quantity FROM product_inventory WHERE product_name = '$productName'";
        $result = pg_query($db, $query);

        if ($row = pg_fetch_assoc($result)) {
            $available = (int)$row['available_quantity'];
            $newQuantity = $available - $orderedQuantity;
            if ($newQuantity < 0) {
                // Se la quantità acquistata supera quella disponibile, effettua il rollback e mostra un errore
                pg_query($db, "ROLLBACK");
                die("Errore: per il prodotto '$productName' sono disponibili solo $available unità.");
            }
            
            // Esegui l'aggiornamento dell'inventario
            $updateQuery = "UPDATE product_inventory SET available_quantity = $newQuantity WHERE product_name = '$productName'";
            $updateResult = pg_query($db, $updateQuery);
            if (!$updateResult) {
                pg_query($db, "ROLLBACK");
                die("Errore durante l'aggiornamento dell'inventario per il prodotto '$productName'.");
            }
            
            $queryDetail = "INSERT INTO order_details (order_id, product_id, quantity, price) 
            VALUES ($orderId, (SELECT product_id FROM product_inventory WHERE product_name = '$productName'), $orderedQuantity, $price)";
            $detailResult = pg_query($db, $queryDetail);

            if (!$detailResult) {
                pg_query($db, "ROLLBACK");
                die("Errore nell'inserimento dei dettagli dell'ordine per '$productName'.");
            }

            $totalPrice += $orderedQuantity * $price;
        } else {
            pg_query($db, "ROLLBACK");
            die("Errore: prodotto '$productName' non trovato in inventario.");
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
};
?>
<?php 
    setcookie("cart", "", time() - 3600); // Cancella il cookie specificando il percorso
?>

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
        $importo = $_GET['importo'];
        $nome = $_GET['nome'];
        $cognome = $_GET['cognome'];
        $sesso = $_GET['sesso'];
        $email = $_GET['email'];
        $telefono = $_GET['telefono'];
        $residenza = $_GET['residenza'];
        $data = $_GET['data'];
        $cartItems = $_GET['cartItems'];

        // Riformatta la data nel formato giorno, mese, anno
        $date = DateTime::createFromFormat('Y-m-d', $data);
        $formattedDate = $date->format('d-m-Y');

        echo "<section id='buyer_data'>";
        echo "<h2>Riepilogo ordine n. $orderId</h2>";
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
        echo "<h2>Merchandising acquistato</h2>";
        echo "<ul>";
        foreach ($cartItems as $item) {
            echo "<li>" . htmlspecialchars($item['product_name']) . " - Quantità: " . htmlspecialchars($item['quantity']) . " - Prezzo: €" . number_format($item['price'], 2, ',', '.') . "</li>";
        }
        echo "</ul>";
        echo "</section>";
    } else {
        echo "<p>Errore durante il recupero dei dati dell'ordine.</p>";
    }
        echo "</section>"
    ?>
    </main>

    <?php include 'footer.html'; ?>
</body>
</html>
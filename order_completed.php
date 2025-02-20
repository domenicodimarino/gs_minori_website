<?php require 'db.php'?>
<?php 
// Recupera il carrello dal cookie
if (isset($_COOKIE['cart'])) {
    $cartItems = unserialize($_COOKIE['cart']);
} else {
    die("Nessun prodotto nel carrello.");
}

// Avvia una transazione per assicurarti che tutti gli aggiornamenti siano atomici
pg_query($db, "BEGIN");

foreach ($cartItems as $item) {
    // Assicurati che il nome del prodotto e la quantità siano presenti
    if (!isset($item['product_name']) || !isset($item['quantity'])) {
        continue;
    }
    
    $productName = pg_escape_string($db, $item['product_name']);
    $orderedQuantity = (int)$item['quantity'];

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
    } else {
        pg_query($db, "ROLLBACK");
        die("Errore: prodotto '$productName' non trovato in inventario.");
    }
}

// Se tutto è andato a buon fine, conferma la transazione
pg_query($db, "COMMIT");
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
        echo "<h2>Riepilogo ordine</h2>";
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
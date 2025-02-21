<?php require 'db.php'; ?>
<?php
// Inserimento di una nuova news
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['titolo'])) {
    $titolo = $_POST['titolo'];
    $descrizione = $_POST['descrizione'];
    $contenuto = $_POST['contenuto'];
    $id_immagine = $_POST['id_immagine'];  // Utilizzo dell'ID immagine

    $sql = "INSERT INTO news (titolo, descrizione, contenuto, id_immagine, data_pubblicazione) 
            VALUES ($1, $2, $3, $4, NOW())";
    $result = pg_query_params($db, $sql, array($titolo, $descrizione, $contenuto, $id_immagine));

    if ($result) {
        echo "News inserita con successo!";
    } else {
        echo "Errore nell'inserimento: " . pg_last_error($db);
    }
    exit;
}

// Recupero delle news dal database
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 0;
$sql = "SELECT n.id, n.titolo, n.descrizione, n.contenuto, n.data_pubblicazione, i.immagine 
        FROM news n
        LEFT JOIN immagini_newa i ON n.id_immagine = i.id
        ORDER BY n.data_pubblicazione DESC";
if ($limit > 0) {
    $sql .= " LIMIT $1";
    $result = pg_query_params($db, $sql, array($limit));
} else {
    $result = pg_query($db, $sql);
}

if ($result) {
    $news = pg_fetch_all($result);
} else {
    $news = [];
}

// Restituisce i dati in formato JSON per l'uso in JavaScript
header('Content-Type: application/json');
echo json_encode($news);
?>

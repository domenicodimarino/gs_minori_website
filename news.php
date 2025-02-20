<?php
// Configurazione della connessione al database
$host = "localhost";  // Cambia se necessario
$dbname = "gruppo01";  // Sostituisci con il nome corretto
$user = "www";  // Utente PostgreSQL
$password = "tw2024";  // Inserisci la password corretta

// Connessione al database
try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Errore di connessione al database: " . $e->getMessage());
}

// Inserimento di una nuova news
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['titolo'])) {
    $titolo = $_POST['titolo'];
    $descrizione = $_POST['descrizione'];
    $contenuto = $_POST['contenuto'];
    $id_immagine = $_POST['id_immagine'];  // Utilizzo dell'ID immagine

    $sql = "INSERT INTO news (titolo, descrizione, contenuto, id_immagine, data_pubblicazione) 
            VALUES (:titolo, :descrizione, :contenuto, :id_immagine, NOW())";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':titolo' => $titolo,
            ':descrizione' => $descrizione,
            ':contenuto' => $contenuto,
            ':id_immagine' => $id_immagine  // Inserimento dell'ID dell'immagine
        ]);
        echo "News inserita con successo!";
    } catch (PDOException $e) {
        echo "Errore nell'inserimento: " . $e->getMessage();
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
    $sql .= " LIMIT :limit";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
} else {
    $stmt = $pdo->query($sql);
}
$news = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Restituisce i dati in formato JSON per l'uso in JavaScript
header('Content-Type: application/json');
echo json_encode($news);
?>

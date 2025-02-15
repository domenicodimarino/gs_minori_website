<?php
// Configurazione della connessione al database
$host = "localhost";
$dbname = "gruppo01";
$user = "www";
$password = "tw2024";

// Connessione al database
try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Database connection error: " . $e->getMessage());
}

// Inserimento di un nuovo contenuto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['content'], $_POST['nome_utente'])) {
    $contenuto = $_POST['content'];
    $nome_utente = $_POST['nome_utente'];
    $imagePath = null;

    // Gestione dell'upload dell'immagine
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
      
        $uploadDir = '/uploads/';
        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            die("Error uploading the image.");
        }
    }

    $sql = "INSERT INTO community_posts (contenuto, nome_utente, immagine) VALUES (:contenuto, :nome_utente, :immagine)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':contenuto' => $contenuto,
            ':nome_utente' => $nome_utente,
            ':immagine' => $imagePath
        ]);
        echo "Contenuto postato con successo!";
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
    }
}
header("Location: fan.php");
exit;
?>
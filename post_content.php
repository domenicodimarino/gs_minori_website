<?php
// Configurazione della connessione al database
$host = "localhost";
$dbname = "postgres";
$user = "www";
$password = "llel3";

// Connessione al database
try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Errore di connessione al database: " . $e->getMessage());
}

// Inserimento di un nuovo contenuto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['content'])) {
    $contenuto = $_POST['content'];

    $sql = "INSERT INTO community_posts (contenuto) VALUES (:contenuto)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([':contenuto' => $contenuto]);
        echo "Contenuto postato con successo!";
    } catch (PDOException $e) {
        echo "Errore nell'inserimento: " . $e->getMessage();
    }
}
header("Location: fan.php");
exit;
?>
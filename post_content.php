<?php require 'db.php'; ?>
<?php
// Inserimento di un nuovo contenuto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['content'], $_POST['nome_utente'])) {
    $contenuto = $_POST['content'];
    $nome_utente = $_POST['nome_utente'];
    $imagePath = null;

    // Gestione dell'upload dell'immagine
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            die("Error uploading the image.");
        }
    }

    $sql = "INSERT INTO community_posts (contenuto, nome_utente, immagine) VALUES ($1, $2, $3)";
    $result = pg_query_params($db, $sql, array($contenuto, $nome_utente, $imagePath));

    if ($result) {
        echo "Contenuto postato con successo!";
    } else {
        echo "Errore nell'inserimento: " . pg_last_error($db);
    }
}
header("Location: fan.php");
exit;
?>
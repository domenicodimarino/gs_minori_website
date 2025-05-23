<?php
// Avvia la sessione se non è già avviata
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.php';

    $username = $_SESSION['username'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // Viene controllata la lunghezza della nuova password
    if (strlen($new_password) < 8) {
        echo "<script>alert('La nuova password deve essere di almeno 8 caratteri.'); window.location.href = 'reset_password.php';</script>";
        exit();
    }

    // Viene recuperata la vecchia pass dal database
    $sql = "SELECT password FROM account WHERE username = $1";
    $result = pg_query_params($db, $sql, array($username));

    if ($result === false) {
        die("Errore nella preparazione della query: " . pg_last_error($db));
    }

    if (pg_num_rows($result) > 0) {
        $user = pg_fetch_assoc($result);
        $old_password_hash = $user['password'];

        // Verifica la vecchia password inserita dall'utente
        if (!password_verify($old_password, $old_password_hash)) {
            echo "<script>alert('Vecchia password incorretta.'); window.location.href = 'reset_password.php';</script>";
            exit();
        }

        // Confronta la vecchia password con la nuova password
        if (password_verify($new_password, $old_password_hash)) {
            echo "<script>alert('La nuova password non può essere uguale alla vecchia password.'); window.location.href = 'reset_password.php';</script>";
            exit();
        } else {
            // Hash della nuova password e aggiornamento nel database
            $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

            $sql = "UPDATE account SET password = $1 WHERE username = $2";
            $result = pg_query_params($db, $sql, array($new_password_hash, $username));

            if ($result === false) {
                die("Errore nella preparazione della query: " . pg_last_error($db));
            }

            pg_free_result($result);
            pg_close($db);

            echo "<script>alert('Cambio di password avvenuto con successo.'); window.location.href = 'impostazioni_profilo.php';</script>";
            exit();
        }
    } else {
        echo "Nessun utente trovato.";
        exit();
    }

    pg_free_result($result);
    pg_close($db);
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reimposta Password - G.S. Minori</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset_password.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<?php include 'header.php'; ?>
<body>
    <main>
    <div class="container">
        <h1>Reimposta Password</h1>
        <form method="post" action="reset_password.php">
            <label for="old_password">Vecchia Password:</label>
            <input type="password" id="old_password" name="old_password" required>
            <label for="new_password">Nuova Password:</label>
            <input type="password" id="new_password" name="new_password" required>
            <div class="button-container">
                <button type="submit">Reimposta</button>
                <a href="impostazioni_profilo.php" class="back-button">Indietro</a>
            </div>
        </form>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'footer.html'?>
</body>
</html>
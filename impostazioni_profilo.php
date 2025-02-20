<?php include 'header.php'; ?>
<?php
// Avvia la sessione se non è già avviata
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se l'utente è autenticato
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Connessione al database
require 'db.php';

$username = $_SESSION['username'];

$sql = "SELECT nome, cognome, username, email FROM account WHERE username = $1";
$result = pg_query_params($db, $sql, array($username));

if ($result === false) {
    die("Errore nella preparazione della query: " . pg_last_error($db));
}

if (pg_num_rows($result) > 0) {
    $user = pg_fetch_assoc($result);
} else {
    echo "Nessun utente trovato.";
    exit();
}

pg_free_result($result);
pg_close($db);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impostazioni Profilo - G.S. Minori</title>
    <link rel="stylesheet" href="style.css">
    <style>
        main {
            margin: 0;
            font-family: Arial, sans-serif;
            height: 75vh;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .profilo p {
            margin: 10px 0;
            color: #555;
            font-size: 18px;
        }
        .password-container {
            margin-top: 20px;
        }
        .password-container button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 50px; /* Rendi il pulsante rotondo */
            cursor: pointer;
            font-size: 16px;
        }
        .password-container button:hover {
            background-color: #0056b3;
        }
        .back-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #ff0000;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 50px; /* Rendi il pulsante rotondo */
            font-size: 16px;
            text-align: center;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <main>
    <div class="container">
        <h1>Impostazioni Profilo</h1>
        <section class="profilo">
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($user['nome']); ?></p>
            <p><strong>Cognome:</strong> <?php echo htmlspecialchars($user['cognome']); ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <div class="password-container">
                <p>Se vuoi reimpostare la password, <button onclick="resetPassword()">Clicca qui</button>.</p>
                <a href="homepage.php" class="back-button">Indietro</a>
            </div>
        </section>
    </div>
    </main>
    <!-- Footer -->
    <?php include 'footer.html'?>

    <script>
        function resetPassword() {
            window.location.href = 'reset_password.php';
        }
    </script>
</body>
</html>
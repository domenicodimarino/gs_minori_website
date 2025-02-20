<?php include 'header.php'; ?>
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
    $new_password = $_POST['new_password'];

    // Recupera la vecchia password dal database
    $sql = "SELECT password FROM account WHERE username = $1";
    $result = pg_query_params($db, $sql, array($username));

    if ($result === false) {
        die("Errore nella preparazione della query: " . pg_last_error($db));
    }

    if (pg_num_rows($result) > 0) {
        $user = pg_fetch_assoc($result);
        $old_password_hash = $user['password'];

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
            max-width: 500px;
            width: 100%;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        h1 {
            margin-bottom: 15px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin-bottom: 10px;
            color: #555;
            font-size: 16px;
        }
        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 50px; /* Rendi i pulsanti rotondi */
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }

        #new_password {
            width: 300px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 5px; /* Riduci lo spazio tra i pulsanti */
            width: 100%;
        }
        button, .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 50px; /* Rendi i pulsanti rotondi */
            font-size: 16px;
            text-align: center;
            cursor: pointer;
        }
        .back-button {
            background-color: #ff0000;
        }
        .back-button:hover {
            background-color: #cc0000;
        }
        
        @media (max-width: 576px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 24px;
            }
            label {
                font-size: 14px;
            }
            input {
                font-size: 14px;
            }
            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <main>
    <div class="container">
        <h1>Reimposta Password</h1>
        <form method="post" action="reset_password.php">
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
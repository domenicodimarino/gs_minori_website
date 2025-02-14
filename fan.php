<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="fan.css" type="text/css"/>
    <title>Fan Page</title>
</head>
<body>
    <?php include 'header.html'; ?>

    <main>
        
        <h1>Benvenuto nella fan page</h1>
        <section id="intro">        
            <p>Questa è la pagina dedicata ai fan di GS Minori. </p>
        </section>

        <section id="community">
            <h2>Community</h2>
            <p>Unisciti alla nostra community di fan e partecipa alle discussioni.</p>
            <!-- Aggiungi qui ulteriori dettagli sulla community -->
            <form action="post_content.php" method="post">
                <label for="content">Posta un contenuto:</label><br>
                <textarea id="content" name="content" rows="4" cols="50"></textarea><br>
                <input type="submit" value="Posta">
            </form>

            <h3>Contenuti postati:</h3>
            <div class="posted-content">
                <?php
                // Connessione al database
                $host = "localhost";
                $dbname = "postgres";
                $user = "www";
                $password = "llel3";

                try {
                    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ]);
                } catch (PDOException $e) {
                    die("Errore di connessione al database: " . $e->getMessage());
                }

                // Recupero dei contenuti postati
                $sql = "SELECT * FROM community_posts ORDER BY data_pubblicazione DESC";
                $stmt = $pdo->query($sql);
                $contentsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($contentsArray)) {
                    foreach ($contentsArray as $content) {
                        echo '<div>';
                        echo '<p>' . htmlspecialchars($content['contenuto']) . '</p>';
                        echo '<p><small>Pubblicato il: ' . htmlspecialchars($content['data_pubblicazione']) . '</small></p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Nessun contenuto postato.</p>';
                }
                ?>
            </div>
        </section>

        <section id="concorsi">
            
            <h2>Concorsi</h2>
            <p>Partecipa ai nostri concorsi e vinci fantastici premi.</p>
            <!-- Aggiungi qui ulteriori dettagli sui concorsi -->
            <div class="contests">
            <?php
            // Recupero dei concorsi
            $sql = "SELECT * FROM concorsi ORDER BY id DESC";
            $stmt = $pdo->query($sql);
            $contestsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($contestsArray)) {
                foreach ($contestsArray as $contest) {
                    echo '<div class="contest" data-title="' . htmlspecialchars($contest['titolo']) . '" data-description="' . htmlspecialchars($contest['descrizione']) . '">';
                    echo '<img src="' . htmlspecialchars($contest['immagine']) . '" alt="' . htmlspecialchars($contest['titolo']) . '">';
                    echo '<h3>' . htmlspecialchars($contest['titolo']) . '</h3>';
                    echo '<p>' . htmlspecialchars($contest['descrizione']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>Nessun concorso disponibile al momento.</p>';
            }
            ?>
            </div>
        </section>
    </main>

    <?php include 'footer.html'; ?>

    <!-- Modal per visualizzare maggiori informazioni sui concorsi -->
    <div id="contestModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content">
            <h2 id="modalTitle"></h2>
            <p id="modalDescription"></p>
        </div>
    </div>

    <script>
        // Gestione dell'apertura del modal per i concorsi
        document.querySelectorAll('.contest').forEach(function(element) {
            element.addEventListener('click', function() {
                var title = this.getAttribute('data-title');
                var description = this.getAttribute('data-description');

                document.getElementById('modalTitle').textContent = title;
                document.getElementById('modalDescription').textContent = description;

                document.getElementById('contestModal').style.display = 'block';
            });
        });

        // Chiudi il modal quando si clicca sulla X
        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('contestModal').style.display = 'none';
        });

        // Chiudi il modal quando si clicca fuori dal modal
        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('contestModal')) {
                document.getElementById('contestModal').style.display = 'none';
            }
        });
    </script>
</body>
</html>

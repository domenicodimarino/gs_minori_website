<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagione - G.S. Minori</title>
    <link rel="stylesheet" href="stagione.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'header.html'?>

    <main>
        <h1>Calendario delle Partite</h1>
        <section class="calendario">
            <div class="partita">
                <h2>Prossima Partita</h2>
                <div id="prossima-partita">
                    <!-- I dati della prossima partita verranno caricati qui -->
                </div>
                <button id="prevMatch" disabled>Precedente Partita</button>
                <button id="nextMatch">Prossima Partita</button>
            </div>
        </section>

        <h1>Classifica del Campionato</h1>
        <section class="classifica">
            <table>
                <thead>
                    <tr>
                        <th>Posizione</th>
                        <th>Squadra</th>
                        <th>Punti</th>
                        <th><a href="https://fip.it/risultati/?group=campionati-regionali&regione_codice=CM&comitato_codice=RCM&sesso=M&codice_campionato=PM&codice_fase=1&codice_girone=66493"><i class="fas fa-info-circle"></a></i></th>
                    </tr>
                </thead>
                <tbody id="classifica-body">
                    <!-- I dati della classifica verranno caricati qui -->
                </tbody>
            </table>
        </section>

        <h1>Classifica da playbasket</h1>
        
        <div id="table-container">Caricamento in corso...</div>

        <script>
            const proxy = "https://api.allorigins.win/raw?url=";
            const url = "https://www.playbasket.it/campania/league.php?lt=2&lf=M&lr=CM&lp=NA&lc=DR2&lg=2&mod=st&season=2025";

            fetch(proxy + encodeURIComponent(url))
            .then(response => response.text())
            .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, "text/html");

            const tables = doc.querySelectorAll("table");
            if (tables.length >= 2) {
            document.getElementById("table-container").innerHTML = tables[1].outerHTML;
            document.getElementById("table-container").querySelector("table").classList.add("playbasket-table");
            } else {
            document.getElementById("table-container").innerText = "Tabella non trovata.";
            }
        })
        .catch(error => {
            console.error("Errore:", error);
            document.getElementById("table-container").innerText = "Errore durante l'importazione.";
        });


        </script>

    </main>
    <script src="stagione.js"></script>
    <!-- Footer -->
    <?php include 'footer.html'?>
</body>
</html>
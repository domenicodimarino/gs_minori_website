const url = "https://www.playbasket.it/campania/league.php?lt=2&lf=M&lr=CM&lp=NA&lc=DR2&lg=2&mod=st&season=2025";
            const proxy = "https://api.allorigins.win/raw?url=" + encodeURIComponent(url);

            // Creazione della richiesta
            var xhr = new XMLHttpRequest();
            xhr.open("GET", proxy, true);

            // Gestiamo la risposta per controllare che sia andato tutto a buon fine
            xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) { // Stato "completato"
                if (xhr.status === 200) { // Stato HTTP OK
                const parser = new DOMParser();
                const doc = parser.parseFromString(xhr.responseText, "text/html");

                const tables = doc.querySelectorAll("table");
                if (tables.length >= 2) {
                    document.getElementById("table-container").innerHTML = tables[1].outerHTML;
                    const table = document.getElementById("table-container").querySelector("table");
                    table.classList.add("playbasket-table");
                    table.id = "dynamic-leaderboard";
                } else {
                    document.getElementById("table-container").innerText = "Tabella non trovata.";
                }
                } else {
                document.getElementById("table-container").innerText = "Errore durante l'importazione.";
                }
            }
            };

    // Invia la richiesta
    xhr.send();
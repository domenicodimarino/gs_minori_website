document.addEventListener("DOMContentLoaded", function () {
    const playerData = document.getElementById("player-data");
    let url = "";

    if (playerData) {
        url = playerData.getAttribute("data-stats-link");
    }
    const proxy = "https://api.allorigins.win/raw?url=" + encodeURIComponent(url);

    var xhr = new XMLHttpRequest();
    xhr.open("GET", proxy, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { // Stato "completato"
            if (xhr.status === 200) { // Stato HTTP OK
                const parser = new DOMParser();
                const doc = parser.parseFromString(xhr.responseText, "text/html");

                // Selezioniamo la prima tabella con classe "tabella_partita"
                const table = doc.querySelector("table.tabella_partita");
                
                if (table) {
                    document.getElementById("table-container").innerHTML = table.outerHTML;
                    const importedTable = document.getElementById("table-container").querySelector("table");
                    importedTable.classList.add("playbasket-table");
                    importedTable.id = "dynamic-match-table";

                    // Rimuoviamo i link interni mantenendo solo il testo
                    importedTable.querySelectorAll("a").forEach(link => link.replaceWith(document.createTextNode(link.textContent)));

                    // Aggiungiamo l'intestazione per la nuova colonna "Risultato"
                    let headerRow = importedTable.querySelector("tr");
                    if (headerRow) {
                        let newHeader = document.createElement("th");
                        headerRow.appendChild(newHeader);
                    }

                    // Modifichiamo tutte le righe per estrarre il risultato dalla seconda colonna
                    importedTable.querySelectorAll("tr").forEach((row, rowIndex) => {
                        let cells = row.querySelectorAll("td, th");

                        if (cells.length > 1) {
                            let secondCol = cells[1]; // Seconda colonna
                            let match = secondCol.textContent.match(/\[(W|L)\] \d+-\d+/); // Cerca [W] o [L] con punteggio
                            let resultText = match ? match[0] : ""; // Se trovato, lo salva

                            // Rimuove il risultato dalla seconda colonna
                            if (match) {
                                secondCol.textContent = secondCol.textContent.replace(match[0], "").trim();
                            }

                            // Aggiunge una nuova colonna per il risultato
                            let newCell = document.createElement(rowIndex === 0 ? "th" : "td");
                            newCell.textContent = resultText;
                            row.appendChild(newCell);
                        }

                        // Rimuoviamo le colonne in eccesso (dalla quarta in poi)
                        cells.forEach((cell, index) => {
                            if (index >= 3) {
                                cell.remove();
                            }
                        });
                    });

                    // Aggiungiamo la scritta "Risultato" all'ultimo th
                    let lastTh = importedTable.querySelector("th:last-child");
                    if (lastTh) {
                        lastTh.textContent = "Risultato";
                    }
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
});

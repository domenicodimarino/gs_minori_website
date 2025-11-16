document.addEventListener("DOMContentLoaded", function () {
    //OLD LINK --> const url = "https://www.playbasket.it/campania/league.php?lt=2&lf=M&lr=CM&lp=NA&lc=DR2&season=2025&lg=2&mod=cl";
    const url = "https://www.playbasket.it/campania/league.php?lt=2&lf=M&lr=CM&lp=NA&lc=DR2&season=2026&lg=2&mod=cl";
    const proxy = BASE_PROXY_PATH + "?url=" + encodeURIComponent(url);

    var xhr = new XMLHttpRequest();
    xhr.open("GET", proxy, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { // Stato "completato"
            if (xhr.status === 200) { // Stato HTTP OK
                const parser = new DOMParser();
                const doc = parser.parseFromString(xhr.responseText, "text/html");

                // Seleziona tutte le tabelle
                const allTables = doc.querySelectorAll("table");

                // Crea una nuova tabella con header e body
                const newTable = document.createElement("table");
                newTable.classList.add("playbasket-table");
                newTable.id = "dynamic-season";

                // Crea l'intestazione della tabella
                const thead = newTable.createTHead();
                const headerRow = thead.insertRow();
                const headers = ["DATA", "SQUADRA DI CASA", "SQUADRA OSPITE", "RISULTATO"];
                headers.forEach((text, index) => {
                    const th = document.createElement("th");
                    th.innerText = text;
                    // L'ultima cella "RISULTATO" deve occupare due colonne
                    if (index === 3) {
                        th.colSpan = 2;
                    }
                    headerRow.appendChild(th);
                });

                // Crea il body della tabella
                const tbody = document.createElement("tbody");

                // Itera su tutte le tabelle e righe
                allTables.forEach(table => {
                    const rows = table.querySelectorAll("tr");
                    rows.forEach(row => {
                        // Rimuove eventuali link per avere solo il testo
                        row.querySelectorAll("a").forEach(link =>
                            link.replaceWith(document.createTextNode(link.textContent))
                        );

                        // Se la riga contiene "GS Minori" in almeno una cella
                        if (Array.from(row.cells).some(cell => cell.textContent.includes("GS Minori"))) {
                            // Costruisci una nuova riga con le celle desiderate
                            const newRow = document.createElement("tr");

                            // Copia i dati delle prime tre colonne
                            for (let i = 0; i < 3; i++) {
                                const td = document.createElement("td");
                                td.innerHTML = row.cells[i] ? row.cells[i].innerHTML : "";
                                newRow.appendChild(td);
                            }

                            // Unisci tutti i dati a partire dalla quarta cella in poi
                            let mergedResult = "";
                            for (let i = 3; i < row.cells.length; i++) {
                                if(i == 4){
                                    let check_match = row.cells[i].innerHTML;
                                    if(check_match.includes(":")){
                                        mergedResult += row.cells[i].innerHTML;
                                        break;
                                    }
                                }
                                if(i == 5)
                                    mergedResult += " - ";
                                mergedResult += row.cells[i].innerHTML;
                            }

                            // Crea la cella "RISULTATO" unita
                            const tdResult = document.createElement("td");
                            tdResult.colSpan = 2; // si estende su due colonne
                            tdResult.innerHTML = mergedResult;
                            newRow.appendChild(tdResult);

                            tbody.appendChild(newRow);
                        }
                    });
                });

                newTable.appendChild(tbody);

                // Inserisci la tabella nel container se sono state trovate righe
                const container = document.getElementById("table-container");
                if (tbody.rows.length > 0) {
                    container.innerHTML = "";
                    container.appendChild(newTable);
                } else {
                    container.innerText = "Nessuna riga trovata contenente 'GS Minori'.";
                }
            } else {
                document.getElementById("table-container").innerText = "Errore durante l'importazione.";
            }
        }
    };

    xhr.send();
});

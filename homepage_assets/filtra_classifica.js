document.addEventListener('DOMContentLoaded', function() {
    function filtraClassifica() {
        const table = document.getElementById('dynamic-leaderboard');
        if (!table) {
            console.error('Tabella non trovata.');
            return;
        }

        const rows = table.querySelectorAll('tr');
        let minoriIndex = -1;

        // Trova l'indice della riga contenente "GS Minori"
        rows.forEach((row, index) => {
            if (row.textContent.includes('GS Minori')) {
                minoriIndex = index;
            }
        });

        if (minoriIndex !== -1) {
            const start = Math.max(0, minoriIndex - 1);
            const end = Math.min(rows.length - 1, minoriIndex + 1);
            const filteredRows = Array.from(rows).slice(start, end + 1);

            // Crea una nuova tabella con le righe filtrate
            let tableHtml = '<table class="playbasket-table" id="filtered-leaderboard"><thead>' + table.querySelector('thead').outerHTML + '</thead><tbody>';
            filteredRows.forEach(row => {
                tableHtml += row.outerHTML;
            });
            tableHtml += '</tbody></table>';

            document.getElementById('table-container').innerHTML = tableHtml;

            // Evidenzia la riga contenente "GS Minori"
            const newRows = document.querySelectorAll('#filtered-leaderboard tr');
            newRows.forEach(row => {
                if (row.textContent.includes('GS Minori')) {
                    row.id = 'evidenziata';
                }
            });
        } else {
            document.getElementById('table-container').innerText = 'GS Minori non trovata.';
        }
    }

    // Usa un MutationObserver per osservare i cambiamenti nel DOM
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length > 0) {
                const table = document.getElementById('dynamic-leaderboard');
                if (table) {
                    observer.disconnect(); // Smetti di osservare una volta trovata la tabella
                    filtraClassifica();
                }
            }
        });
    });

    // Inizia a osservare il contenitore della tabella
    const config = { childList: true, subtree: true };
    observer.observe(document.getElementById('table-container'), config);
});
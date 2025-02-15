document.addEventListener('DOMContentLoaded', function () {
    const classificaBody = document.getElementById('classifica-body');
    const nextMatchButton = document.getElementById('nextMatch');
    const prevMatchButton = document.getElementById('prevMatch');
    const prossimaPartitaDiv = document.getElementById('prossima-partita');
    let currentMatchIndex = 0;
    let partite = [];

    function loadClassifica() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'classifica.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                classificaBody.innerHTML = '';
                data.forEach(team => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${team.posizione}</td>
                        <td>${team.squadra}</td>
                        <td>${team.punti}</td>
                        <td class="more-info"><i class="fas fa-chevron-down"></i></td>
                    `;
                    const detailsRow = document.createElement('tr');
                    detailsRow.classList.add('details');
                    detailsRow.innerHTML = `
                        <td colspan="4">
                            <p><strong>Partite Giocate:</strong> ${team.partite_giocate}</p>
                            <p><strong>Vittorie:</strong> ${team.vittorie}</p>
                            <p><strong>Sconfitte:</strong> ${team.sconfitte}</p>
                        </td>
                    `;
                    classificaBody.appendChild(row);
                    classificaBody.appendChild(detailsRow);
                });

                document.querySelectorAll('.more-info').forEach(function(element) {
                    element.addEventListener('click', function() {
                        var details = this.closest('tr').nextElementSibling;
                        if (details.style.display === 'table-row') {
                            details.style.display = 'none';
                            this.innerHTML = '<i class="fas fa-chevron-down"></i>';
                        } else {
                            details.style.display = 'table-row';
                            this.innerHTML = '<i class="fas fa-chevron-up"></i>';
                        }
                    });
                });
            }
        };
        xhr.send();
    }

    function loadProssimaPartita() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'prossima_partita.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                partite = JSON.parse(xhr.responseText);
                updateProssimaPartita();
            }
        };
        xhr.send();
    }

    function updateProssimaPartita() {
        if (partite.length > 0) {
            const partita = partite[currentMatchIndex];
            prossimaPartitaDiv.innerHTML = `
                <p><strong>Data:</strong> ${partita.data}</p>
                <p><strong>Squadre:</strong> ${partita.squadre}</p>
                <p><strong>Luogo:</strong> ${partita.luogo}</p>
            `;
            prevMatchButton.disabled = currentMatchIndex === 0;
            nextMatchButton.disabled = currentMatchIndex === partite.length - 1;
        } else {
            alert('Prossima partita non disponibile.');
        }
    }

    function showNextMatch() {
        if (currentMatchIndex < partite.length - 1) {
            currentMatchIndex++;
            updateProssimaPartita();
        }
    }

    function showPrevMatch() {
        if (currentMatchIndex > 0) {
            currentMatchIndex--;
            updateProssimaPartita();
        }
    }

    nextMatchButton.addEventListener('click', showNextMatch);
    prevMatchButton.addEventListener('click', showPrevMatch);

    loadClassifica();
    loadProssimaPartita();
});
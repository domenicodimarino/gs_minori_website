document.addEventListener('DOMContentLoaded', function () {
    const nextMatchButton = document.getElementById('nextMatch');
    const prevMatchButton = document.getElementById('prevMatch');
    const prossimaPartitaDiv = document.getElementById('prossima-partita');
    let currentMatchIndex = 0;
    let partite = [];

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

    loadProssimaPartita();
});
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
                <p><strong>Data:</strong> 15 Febbraio 2025</p>
                <p><strong>Squadre:</strong> GS Minori vs Virtus Siano</p>
                <p><strong>Luogo:</strong> Tendostruttura Gabriele Di Lieto</p>
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
                        <th><i class="fas fa-info-circle"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>GS Minori</td>
                        <td>30</td>
                        <td class="more-info"><i class="fas fa-chevron-down"></i></td>
                    </tr>
                    <tr class="details">
                        <td colspan="4">
                            <p><strong>Partite Giocate:</strong> 15</p>
                            <p><strong>Vittorie:</strong> 10</p>
                            <p><strong>Sconfitte:</strong> 5</p>
                        </td>
                    </tr>
                    <!-- Aggiungi altre squadre qui -->
                </tbody>
            </table>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'footer.html'?>

    <script>
        // JavaScript per il cambio della partita
        document.getElementById('nextMatch').addEventListener('click', function() {
            // Logica per cambiare la partita visualizzata
            alert('Prossima partita non disponibile.');
        });

        // JavaScript per mostrare/nascondere i dettagli della classifica
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
    </script>
</body>
</html>
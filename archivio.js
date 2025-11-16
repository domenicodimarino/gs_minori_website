document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Trova gli elementi
    const selectMenu = document.getElementById('seleziona-anno');
    
    // I contenitori DIV
    const contClassifica = document.getElementById('dati-classifica');
    const contRisultati = document.getElementById('dati-risultati');
    
    // I titoli H2
    const titoloClassifica = document.getElementById('titolo-classifica');
    const titoloRisultati = document.getElementById('titolo-risultati');

    // 2. Ascolta l'evento 'change' sul menu
    selectMenu.addEventListener('change', function() {
        
        const annoSelezionato = this.value; 
        const testoSelezionato = this.options[this.selectedIndex].text;

        if (annoSelezionato) {
            // Aggiorna subito i titoli
            titoloClassifica.innerText = `Classifica ${testoSelezionato}`;
            titoloRisultati.innerText = `Risultati ${testoSelezionato}`;

            // Carica i nuovi dati (vedi funzione helper sotto)
            caricaDati(annoSelezionato, 'classifica', contClassifica);
            caricaDati(annoSelezionato, 'risultati', contRisultati);
        }
    });

    /**
     * Funzione helper per caricare i dati via 'fetch'
     * @param {string} anno - Es: "2024"
     * @param {string} tipo - Es: "classifica" o "risultati"
     * @param {HTMLElement} contenitore - Il div dove inserire l'HTML
     */
    async function caricaDati(anno, tipo, contenitore) {
        
        const path = `archivio/${tipo}_${anno}.html`;
        
        // Messaggio di caricamento
        contenitore.innerHTML = '<p class="loading">Caricamento in corso...</p>';

        try {
            // 1. Prova a scaricare il file
            const response = await fetch(path);

            // 2. Controlla se il file esiste (se 404, lancia un errore)
            if (!response.ok) {
                throw new Error(`File non trovato: ${path}`);
            }
            
            // 3. Prendi l'HTML come testo
            const html = await response.text();
            
            // 4. Inseriscilo nel contenitore
            contenitore.innerHTML = html;

        } catch (error) {
            // 5. Se c'è un errore (es. file non trovato), mostra un messaggio
            console.error('Errore nel caricamento:', error);
            contenitore.innerHTML = '<p class="loading">Dati non disponibili per questa stagione.</p>';
        }
    }
});
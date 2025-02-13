document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const clearButton = document.getElementById("clearButton");
    const resultsList = document.getElementById("resultsList");
    const items = resultsList.querySelectorAll("li");

    // Funzione per aggiornare lo stato della "X"
    function updateClearButton() {
        if (searchInput.value.length > 0) {
            clearButton.style.display = "block";
        } else {
            clearButton.style.display = "none";
            resultsList.style.display = "none"; // Nasconde i risultati se l'input è vuoto
        }
    }

    // Mostra/nasconde la "X" e filtra i risultati
    searchInput.addEventListener("input", function () {
        updateClearButton();
        filterResults(this.value);
    });

    // Cancella il testo e nasconde la lista
    clearButton.addEventListener("click", function () {
        searchInput.value = "";
        updateClearButton();
        searchInput.focus();
        resultsList.style.display = "none"; // Nasconde i risultati quando si cancella il testo
    });

    // Funzione per filtrare i risultati
    function filterResults(query) {
        let visible = false;
        query = query.toLowerCase().trim(); // Normalizza il testo
        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(query) && query.length > 0) {
                item.style.display = "block";
                item.classList.add("highlight");
                visible = true;
            } else {
                item.style.display = "none";
                item.classList.remove("highlight");
            }
        });
        resultsList.style.display = visible ? "block" : "none";
    }

    // Selezione di un elemento
    items.forEach(item => {
        item.addEventListener("click", function () {
            searchInput.value = item.textContent;
            updateClearButton();
            resultsList.style.display = "none";
        });
    });

    // Filtra le immagini in tempo reale
    searchInput.addEventListener('input', function() {
        var filter = this.value.toLowerCase();
        var imageItems = document.querySelectorAll('.image-item');
        imageItems.forEach(function(item) {
            var text = item.textContent.toLowerCase();
            if (text.includes(filter)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Ensure the results list is displayed initially
    updateClearButton();
});
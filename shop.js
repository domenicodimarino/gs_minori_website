document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const clearButton = document.getElementById("clearButton");
    const resultsList = document.getElementById("resultsList");
    const items = resultsList.querySelectorAll("li");
    const imageItems = document.querySelectorAll('.image-item');
    const confirmButton = document.getElementById("confirmButton");
    const cartForm = document.getElementById("cartForm");

    function updateClearButton() {
        if (searchInput.value.length > 0) {
            clearButton.style.display = "block";
        } else {
            clearButton.style.display = "none";
            resultsList.style.display = "none"; // Nasconde i risultati se l'input è vuoto
            showAllImages(); // Mostra tutte le immagini quando l'input è vuoto
        }
    }

    // Filtra i risultati e le immagini
    searchInput.addEventListener("input", function () {
        updateClearButton();
        filterResults(this.value);
    });

    // Cancella il testo e ripristina tutto
    clearButton.addEventListener("click", function () {
        searchInput.value = "";
        updateClearButton();
        resultsList.style.display = "none";
        showAllImages();
    });

    function filterResults(query) {
        let visible = false;
        query = query.toLowerCase().trim();

        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(query) && query.length > 0) {
                item.style.display = "block";
                visible = true;
            } else {
                item.style.display = "none";
            }
        });

        imageItems.forEach(item => {
            const textElement = item.querySelector("p");
            const text = textElement ? textElement.textContent.toLowerCase() : "";
            if (text.includes(query)) {
                item.style.display = "";
                visible = true;
            } else {
                item.style.display = "none";
            }
        });

        resultsList.style.display = visible ? "block" : "none";
    }

    function showAllImages() {
        imageItems.forEach(item => {
            item.style.display = "";
        });
    }

    // Selezione di un suggerimento dalla lista
    items.forEach(item => {
        item.addEventListener("click", function () {
            const selectedText = item.textContent;
            searchInput.value = selectedText;
            updateClearButton();
            resultsList.style.display = "none";

            // Mostra solo il prodotto selezionato e nasconde gli altri
            filterResults(selectedText);
        });
    });

    // Incrementa e decrementa la quantità
    document.querySelectorAll('.increment').forEach(button => {
        button.addEventListener('click', function () {
            const quantityInput = this.previousElementSibling;
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });
    });

    document.querySelectorAll('.decrement').forEach(button => {
        button.addEventListener('click', function () {
            const quantityInput = this.nextElementSibling;
            if (quantityInput.value > 0) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });
    });

    // Gestisci il bottone "Conferma"
    confirmButton.addEventListener('click', function (event) {
        const cartItems = [];
        let totalPrice = 0;
        document.querySelectorAll('.image-item').forEach(item => {
            const quantityInput = item.querySelector('.quantity');
            const quantity = parseInt(quantityInput.value);
            if (quantity > 0) {
                const productName = item.querySelector('p').textContent;
                const price = parseFloat(productName.match(/(\d+,\d+)/)[0].replace(',', '.'));
                totalPrice += price * quantity;
                cartItems.push({ productName, quantity, price });
            }
        });

        if (cartItems.length === 0) {
            alert('Non sono stati inseriti prodotti nel carrello!');
            event.preventDefault(); // Previene l'invio del modulo
        } else {
            // Aggiungi i dati al modulo
            const totalPriceInput = document.createElement('input');
            totalPriceInput.type = 'hidden';
            totalPriceInput.name = 'totalPrice';
            totalPriceInput.value = totalPrice.toFixed(2);
            cartForm.appendChild(totalPriceInput);

            cartItems.forEach((item, index) => {
                const productNameInput = document.createElement('input');
                productNameInput.type = 'hidden';
                productNameInput.name = `cartItems[${index}][productName]`;
                productNameInput.value = item.productName;
                cartForm.appendChild(productNameInput);

                const quantityInput = document.createElement('input');
                quantityInput.type = 'hidden';
                quantityInput.name = `cartItems[${index}][quantity]`;
                quantityInput.value = item.quantity;
                cartForm.appendChild(quantityInput);

                const priceInput = document.createElement('input');
                priceInput.type = 'hidden';
                priceInput.name = `cartItems[${index}][price]`;
                priceInput.value = item.price.toFixed(2);
                cartForm.appendChild(priceInput);
            });
        }
    });

    updateClearButton();
    
});


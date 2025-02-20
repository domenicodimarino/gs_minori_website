document.addEventListener("DOMContentLoaded", function() {
    
    const updateQuantity = (index, delta) => {
        const row = document.querySelectorAll('.cart-table tbody tr')[index];
        const quantityElement = row.querySelector('.quantity');
        const quantityInput = row.querySelector('.quantity-input');
        let quantity = parseInt(quantityElement.textContent);

        const maxQuantity = parseInt(quantityInput.getAttribute('max'));
        if(delta > 0 && quantity < maxQuantity) {
            quantity++;
        }
        else if(delta < 0 && quantity > 0) {
            quantity--;
        }
        if(quantity < 0) {
            quantity = 0;
        }
        quantityElement.textContent = quantity;
        quantityInput.value = quantity;

        // Aggiorna il prezzo totale
        const priceElement = row.querySelector('td:nth-child(3)');
        const totalPriceElement = row.querySelector('.total-price');
        const price = parseFloat(priceElement.textContent.replace('€', ''));
        totalPriceElement.textContent = (quantity * price).toFixed(2) + '€';

        // Rimuovi la riga se la quantità è zero
        if (quantity === 0) {
            row.remove();
            removeFromCart(index);
            updateRowIndices();
        } else {
            updateCart(index, quantity);
        }

        // Aggiorna il totale dell'ordine
        updateTotalPrice();

        // Verifica se il carrello è vuoto
        checkIfCartIsEmpty();
    };

    const updateRowIndices = () => {
        document.querySelectorAll('.cart-table tbody tr').forEach((row, index) => {
            row.dataset.index = index;
            row.querySelector('.decrement').setAttribute('onclick', `updateQuantity(${index}, -1)`);
            row.querySelector('.increment').setAttribute('onclick', `updateQuantity(${index}, 1)`);
        });
    };

    const updateTotalPrice = () => {
        let totalPrice = 0;
        document.querySelectorAll('.total-price').forEach(totalPriceElement => {
            totalPrice += parseFloat(totalPriceElement.textContent.replace('€', ''));
        });
        document.querySelector('#total-price').textContent = 'Totale: €' + totalPrice.toFixed(2);
    };

    const removeFromCart = (index) => {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'remove_from_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    console.log('Product removed successfully');
                } else {
                    console.error(response.message);
                }
            }
        };
        xhr.send('index=' + index);
    };

    const updateCart = (index, quantity) => {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    console.log('Quantity updated successfully');
                } else {
                    console.error(response.message);
                }
            }
        };
        xhr.send('index=' + index + '&quantity=' + quantity);
    };

    const checkIfCartIsEmpty = () => {
        const rows = document.querySelectorAll('.cart-table tbody tr');
        if (rows.length === 0) {
            document.querySelector('.cart-title').style.display = 'none';
            document.querySelector('.cart-table').style.display = 'none';
            document.querySelector('.total-price-container').style.display = 'none';
            document.querySelector('.confirm-order-container').style.display = 'none';
            document.querySelector('.shopping-container').style.display = 'none';
            const emptyCartContainer = document.createElement('div');
            emptyCartContainer.classList.add('empty-cart-container');
            emptyCartContainer.innerHTML = `
                <h1 class="empty-cart-title">IL TUO CARRELLO È VUOTO</h1>
                <a href="shop.php" class="shop-button">COMPRA I NOSTRI PRODOTTI</a>
            `;
            document.querySelector('body').insertBefore(emptyCartContainer, document.querySelector('footer'));
            localStorage.removeItem('cartCount'); // Rimuovi il conteggio dal local storage se il carrello è vuoto
        } else {
            updateCartCount(); // Aggiorna il conteggio del carrello
        }
    };

    window.updateQuantity = updateQuantity;
    checkIfCartIsEmpty(); // Verifica se il carrello è vuoto all'avvio
});
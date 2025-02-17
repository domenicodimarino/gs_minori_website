document.addEventListener('DOMContentLoaded', (event) => {
    const stripe = Stripe('pk_test_51QsLXEJjFWyMfqIBNb2US95HPBqThW5DTUBKGR3sknQucLK5ppV6nqUMZpnNSxjOeYF0POAlQuQzAEgB5LMQcA8P00xVxBMzd6'); // Sostituisci con la tua Public Key

    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');
    const cardErrors = document.getElementById("card-errors");

    const form = document.getElementById('payment-form');

    cardElement.on('change', (event) => {
        if (event.error) {
            cardErrors.textContent = event.error.message;
        } else {
            cardErrors.textContent = '';
        }
    });

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Disabilitiamo il bottone di invio per evitare sottomissioni multiple
        document.getElementById('submit-button').disabled = true;

        // Recuperiamo l'importo ed altri dati dal form
        const amount = parseInt(form.importo.value) * 100; // L'importo deve essere in centesimi

        // Step 1: Creare PaymentIntent sul server
        createPaymentIntent(amount, async (response) => {
            response = JSON.parse(response);
            if (response.error) {
                // Handle server-side error during PaymentIntent creation
                console.error('Error creating PaymentIntent:', response.error);
                cardErrors.textContent = 'Errore durante la creazione del pagamento.';
                document.getElementById('submit-button').disabled = false;
                return;
            }

            const clientSecret = response.clientSecret;
            console.log(clientSecret);

            // Step 2: Confermiamo il pagamento lato client
            const { error, paymentIntent } = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: form.nome.value + ' ' + form.cognome.value // Nome del proprietario della carta
                    },
                },
            });

            if (error) {
                // Gestione degli Stripe error durante la conferma di pagamento
                console.error('Error confirming payment:', error.message);
                cardErrors.textContent = `Errore durante il pagamento: ${error.message}`;
                document.getElementById('submit-button').disabled = false;
            } else if (paymentIntent && paymentIntent.status === 'succeeded') {
                // Payment succeeded
                alert('Pagamento completato con successo!');

                // Creiamo un oggetto con i dati del form
                const formData = new FormData(form);
                const data = {};
                formData.forEach((value, key) => {
                    data[key] = value;
                });

                // Reindirizza alla pagina ticket_completed.php con i dati del form
                const queryString = new URLSearchParams(data).toString();
                const currentPath = window.location.pathname;

                if (currentPath.includes('checkout_cart')) {
                    window.location.href = 'order_completed.php?' + queryString;
                } else if (currentPath.includes('checkout_ticket')) {
                    window.location.href = 'ticket_completed.php?' + queryString;
                }
            } else {
                // Unexpected error
                console.error('Unexpected error during payment confirmation.');
                cardErrors.textContent = 'Errore sconosciuto, riprova.';
                document.getElementById('submit-button').disabled = false;
            }
        });
    });

    // Creiamo un PaymentIntent usando AJAX
    function createPaymentIntent(amount, callback) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'payment.php', true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        const response = xhr.response;
                        console.log(response);
                        callback(response);
                    } catch (e) {
                        console.error('Error parsing JSON response:', e);
                        callback({ error: 'Invalid server response' });
                    }
                } else {
                    console.error('Error with AJAX request:', xhr.statusText);
                    callback({ error: xhr.statusText });
                }
            }
        };
        const formData = new FormData(form);
        // Send the amount as JSON
        xhr.send(formData);
    }
});
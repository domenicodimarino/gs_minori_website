<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Imposta l'intestazione per JSON
header('Content-Type: application/json');
require 'config.php';

if(!isset($_POST["importo"])) {
    // Se l'importo non è stato inviato, restituisci un errore
    http_response_code(400);
    echo json_encode(['error' => 'L\'importo non è stato inviato']);
    exit();
}

$importo = $_POST["importo"];

try {
    // Crea un Payment Intent
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => $importo * 100,
        'currency' => 'eur',
        'payment_method_types' => ['card'],
        'description' => 'Example charge'
    ]);

    // Restituisci la client_secret in JSON
    echo json_encode(['clientSecret' => $paymentIntent->client_secret]);
} catch (Exception $e) {
    // In caso di errore, restituisci il messaggio in JSON
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>

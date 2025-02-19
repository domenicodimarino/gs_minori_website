<?php
// filepath: /Applications/XAMPP/xamppfiles/htdocs/gs_minori_website/clear_cart.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Svuota il carrello
    setcookie('cart', '', time() - 3600); // Cancella il cookie del carrello
    echo '<script>
        localStorage.removeItem("cartCount"); // Rimuovi il conteggio dal local storage
        window.location.href = "cart.php"; // Reindirizza alla pagina del carrello
    </script>';
}
?>
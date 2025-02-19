<?php
setcookie("cart", "", time() - 3600); // Cancella il cookie specificando il percorso
header("Location: cart.php"); // Ricarica la pagina del carrello
exit();
?>
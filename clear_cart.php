<?php
setcookie("cart", "", time() - 3600, "/"); // Cancella il cookie
header("Location: cart.php"); // Ricarica la pagina del carrello
exit();
?>

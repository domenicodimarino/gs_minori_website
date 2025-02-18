<?php
setcookie("cart", "", time() - 3600, "/GS_MINORI/gs_minori_website"); // Cancella il cookie specificando il percorso
header("Location: cart.php"); // Ricarica la pagina del carrello
exit();
?>
<!-- Controllo utente loggato -->       
<?php

if(!isset($_SESSION["username"])){
    $current_url = urlencode(basename($_SERVER['REQUEST_URI']));
    echo "<script>
    alert('Questa è una pagina riservata agli utenti registrati. Effettua il login')
    window.location.href = 'login.php?redirect=$current_url';
    </script>";
    exit();
}
?>
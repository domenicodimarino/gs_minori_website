<?php
// Mostra l'utente corrente (funziona su sistemi Unix)
echo "<h2>Informazioni sul Server</h2>";

// Mostra l'utente corrente secondo get_current_user()
echo "<p><strong>get_current_user():</strong> " . get_current_user() . "</p>";

// Se la funzione POSIX è disponibile, mostra l'utente relativo all'UID corrente
if (function_exists('posix_getuid')) {
    $uid = posix_getuid();
    $userInfo = posix_getpwuid($uid);
    echo "<p><strong>Utente POSIX:</strong> " . $userInfo['name'] . " (UID: $uid)</p>";
} else {
    echo "<p>Le funzioni POSIX non sono disponibili su questo sistema.</p>";
}

// Percorso della cartella da verificare (assicurati che il percorso sia corretto rispetto a questo file)
$uploadDir = 'uploads/';

echo "<h2>Verifica dei permessi della cartella '$uploadDir'</h2>";

if (is_writable($uploadDir)) {
    echo "<p>La cartella '$uploadDir' è scrivibile.</p>";
} else {
    echo "<p>La cartella '$uploadDir' <strong>NON</strong> è scrivibile.</p>";
}

// Mostra i permessi della cartella (su sistemi Unix)
if (file_exists($uploadDir)) {
    $perms = substr(sprintf('%o', fileperms($uploadDir)), -4);
    echo "<p><strong>Permessi della cartella:</strong> $perms</p>";
} else {
    echo "<p>La cartella '$uploadDir' non esiste.</p>";
}
?>

<?php
// proxy.php (Versione Finale con Cache)

// 1. Definisci il nome del file di cache e la durata
// Creiamo un nome file unico basato sull'URL richiesto
$url = $_GET['url'];
$cache_file = 'cache/' . md5($url) . '.html'; // Salva i file in una sottocartella 'cache'
$cache_time = 1800; // 30 minuti (in secondi)

// 2. [IMPORTANTE] Controllo di sicurezza
if (strpos($url, 'https://www.playbasket.it') !== 0) {
    http_response_code(403);
    echo "Errore: Dominio non autorizzato.";
    exit;
}

// 3. Controlla se esiste una cartella 'cache', altrimenti creala
if (!file_exists('cache')) {
    mkdir('cache', 0755, true);
}

// 4. Controlla se esiste un file di cache valido
if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_time) {
    // Se la cache è valida, leggi da lì e invia i dati
    readfile($cache_file);
    exit;
}

// 5. Se la cache non è valida (o non esiste), scarica i dati
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$output = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// 6. Gestisci la risposta
if ($httpcode == 200 && !empty($output)) {
    // Salva l'output nel file di cache
    file_put_contents($cache_file, $output);
    // Invia l'output al browser
    echo $output;
} elseif (file_exists($cache_file)) {
    // Se il download fallisce, usa la cache vecchia (meglio di niente)
    readfile($cache_file);
} else {
    // Errore grave
    http_response_code(502);
    echo "Errore: Impossibile recuperare i dati da playbasket.it e non esiste una cache.";
}
?>
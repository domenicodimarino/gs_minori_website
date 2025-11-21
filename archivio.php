<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivio Stagioni - G.S. Minori</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stagione.css"> 
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    
    <style>
        /* Gli stili per il contenitore bianco rimangono */
        .archivio-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        #seleziona-anno {
            width: 100%;
            padding: 10px;
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        /* Questo è il contenitore per i dati */
        /* Non ha più altezza fissa! Si adatterà al contenuto. */
        .dati-container {
            width: 100%;
            margin-top: 20px;
        }
        
        /* Stile per il caricamento in corso (opzionale) */
        .loading {
            text-align: center;
            padding: 40px;
            font-style: italic;
        }

    </style>
</head>
<body>
    <?php include 'header.php'?>

    <main>
        <div class="archivio-container">
            <h1>Archivio Storico</h1>
            <p>Seleziona una stagione dal menu a tendina per visualizzare la classifica e i risultati.</p>

            <select id="seleziona-anno">
                <option value="2025" selected>Stagione 2024/2025</option>
                <option value="2024">Stagione 2023/2024</option>
                </select>

            <h2 id="titolo-classifica">Classifica Stagione 2024/2025</h2>
            
            <div id="dati-classifica" class="dati-container">
                <?php
                    // CARICHIAMO I DATI 2025 DI DEFAULT CON PHP
                    // La '@' serve a non mostrare errori se il file non esiste
                    @include 'archivio/classifica_2025.html'; 
                ?>
            </div>

            <h2 id="titolo-risultati">Risultati Stagione 2024/2025</h2>
            
            <div id="dati-risultati" class="dati-container">
                <?php
                    // Carichiamo anche i risultati del 2025 di default
                    @include 'archivio/risultati_2025.html'; 
                ?>
            </div>

        </div>
    </main>

    <script src="archivio.js"></script>

    <?php include 'footer.html'?>
</body>
</html>
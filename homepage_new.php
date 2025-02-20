
<html>
    <head>
        <title>GS Minori - Sito ufficiale</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="homepage.css" type="text/css"/>
    </head>
    <body>
        <?php include 'header.php'; ?>

        <main>
            <?php if(isset($_SESSION['user_id'])): ?>
                <!-- Contenuto per utente loggato -->
                <h2>Ciao, <?php echo $_SESSION['username']; ?>!</h2>
            <?php else: ?>
                <!-- Contenuto per utente non loggato -->
                <h2>Benvenuto su GS Minori</h2>
                <p>Accedi per scoprire contenuti esclusivi.</p>
            <?php endif; ?>

            <!-- Sezione ultime attività -->
            <section id="latest-activities">
                <article id="latest-news">
                    <h3>Ultima News</h3>
                    <!--  codice AJAX per prelevare l'ultima news -->
                    <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Esempio di chiamata AJAX per prelevare l'ultima news
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'news.php?limit=1', true); // aggiungendo un parametro per limitare il risultato a 1
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        if(data.length > 0) {
                            var news = data[0];
                            var newsHtml = `
                                <img src="${news.immagine}" alt="${news.titolo}">
                                <h4>${news.titolo}</h4>
                                <p>${news.descrizione}</p>
                                <a href="news_new.php?id=${news.id}">Leggi di più...</a>
                            `;
                            document.getElementById('latest-news').innerHTML = newsHtml;
                        }
                    }
                };
                xhr.send();
            });
        </script>
                </article>

                <article id="latest-photo">
                    <h3>Ultima Foto</h3>
                    <!-- Qui il codice per mostrare l'ultima immagine pubblicata -->
                    <!-- Ad esempio, potresti fare una query simile a quella per le news -->
                </article>

                <article id="latest-video">
                    <h3>Ultimo Video</h3>
                    <!-- Qui il codice per mostrare l'ultimo video pubblicato -->
                </article>
            </section>

            <!-- Link alle altre pagine -->
            <nav id="other-pages">
                <ul>
                    <li><a href="news_new.php">News</a></li>
                    <li><a href="gallery.php">Foto Gallery</a></li>
                    <li><a href="video_gallery.php">Video Gallery</a></li>
                   
                    <!-- Aggiungi altri link se necessario -->
                </ul>
            </nav>
        </main>

        <?php include 'footer.html'; ?>
        <script src="homepage.js"></script>
        
    </body>
</html>


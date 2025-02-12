<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News - G.S. Minori</title>
    <link rel="stylesheet" href="news.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <!-- Header -->
    <?php include 'header.html'?>
  
    <main>
        <h1>Ultime News</h1>

        <!-- Sezione Articoli -->
        <section class="news-articles">
            <article>
                <img src="images/news1.jpg" alt="News 1">
                <h2>Titolo Articolo</h2>
                <p>Descrizione breve dell’articolo...</p>
                <a href="articolo.php?id=1">Leggi di più</a>
            </article>

            <article>
                <img src="images/news2.jpg" alt="News 2">
                <h2>Titolo Articolo 2</h2>
                <p>Descrizione breve dell’articolo...</p>
                <a href="articolo.php?id=2">Leggi di più</a>
            </article>
        </section>

        <!-- Sezione Foto Gallery -->
        <section class="photo-gallery">
            <h2>Foto Gallery</h2>
            <div class="gallery">
                <img src="photo_photo-gallery/photo1.jpg" alt="Foto 1">
                <img src="photo_photo-gallery/photo2.jpg" alt="Foto 2">
                <img src="photo_photo-gallery/photo3.jpg" alt="Foto 3">
            </div>
        </section>

        <!-- Sezione Video -->
        <section class="video-gallery">
            <h2>Video</h2>
            <div class="videos">
                <video controls>
                    <source src="videos/video1.mp4" type="video/mp4">
                    Il tuo browser non supporta il tag video.
                </video>

                <video controls>
                    <source src="videos/video2.mp4" type="video/mp4">
                </video>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'footer.html'?>

</body>
</html>

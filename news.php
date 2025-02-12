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
                <img src="photo_news/news1.jpg" alt="News 1">
                <h2>GS MINORI U19 SCHIANTA LA CAPOLISTA VISION SPORT AVELLINO: 77-48 CON UNO STRARIPANTE D’ALFONSO</h2>
                <p>Il GS Minori U19 firma una vittoria di prestigio battendo nettamente la capolista Vision Sport Avellino con un dominante 77-48. Una prestazione di alto livello, frutto di intensità e organizzazione, con Carlo D’Alfonso autore di 31 punti e 7 triple. A supportarlo, Gabriel Proto con 25 punti.</p>
                <a href="articolo.php?id=1">Leggi di più</a>
            </article>

            <article>
                <img src="photo_news/news2.jpg" alt="News 2">
                <h2>GS Minori conquista una vittoria combattuta contro Virtus Siano: 79-70</h2>
                <p>La serata della 9ª giornata di andata del Girone B di Divisione Regionale 2 ha visto il GS Minori imporsi in casa contro la Virtus Siano con il punteggio di 79-70, al termine di una sfida intensa giocata alla Tendostruttura Gabriele Di Lieto</p>
                <a href="articolo.php?id=2">Leggi di più</a>
            </article>
        </section>

        <!-- Sezione Foto Gallery -->
        <section class="photo-gallery">
            <h2>Foto Gallery</h2>
            <div class="gallery-wrapper">
                <div class="gallery">
                    <img src="photo_photo-gallery/photo1.jpg" alt="Foto 1">
                    <img src="photo_photo-gallery/photo2.jpg" alt="Foto 2">
                    <img src="photo_photo-gallery/photo3.jpg" alt="Foto 3">
                    <img src="photo_photo-gallery/photo4.jpg" alt="Foto 4">
                    <img src="photo_photo-gallery/photo5.jpg" alt="Foto 5">
                    <img src="photo_photo-gallery/photo6.jpg" alt="Foto 6">
                    <img src="photo_photo-gallery/photo7.jpg" alt="Foto 7">
                    <img src="photo_photo-gallery/photo8.jpg" alt="Foto 8">
                    <img src="photo_photo-gallery/photo9.jpg" alt="Foto 9">
                    <img src="photo_photo-gallery/photo10.jpg" alt="Foto 10">
                    <img src="photo_photo-gallery/photo11.jpg" alt="Foto 11">
                    <img src="photo_photo-gallery/photo12.jpg" alt="Foto 12">
                </div>
            </div>
        </section>

        <!-- Modal per l'ingrandimento delle immagini -->
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <div class="modal-content">
                <img id="img01" alt="">
            </div>
        </div>

        <!-- Sezione Video -->
        <section class="video-gallery">
            <h2>Video</h2>
            <div class="video-wrapper">
                <div class="videos">
                    <video controls>
                        <source src="video_video-gallery/video1.mp4" type="video/mp4">
                        Il tuo browser non supporta il tag video.
                    </video>
                    <video controls>
                        <source src="video_video-gallery/video2.mp4" type="video/mp4">
                    </video>
                    <video controls>
                        <source src="video_video-gallery/video3.mp4" type="video/mp4">
                        Il tuo browser non supporta il tag video.
                    </video>
                    <video controls>
                        <source src="video_video-gallery/video4.mp4" type="video/mp4">
                        Il tuo browser non supporta il tag video.
                    </video>


                </div>
            </div>
        </section>

        <!-- Modal per l'ingrandimento dei video -->
        <div id="myModalVideo" class="modal-video">
            <span class="close-video">&times;</span>
            <div class="modal-video-content">
                <video id="video01" controls>
                    <source src="" type="video/mp4">
                </video>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'footer.html'?>

    <!-- JavaScript per il modal -->
    <script>
        // Ottieni il modal per le immagini
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        var images = document.querySelectorAll(".gallery img");

        images.forEach(function(image) {
            image.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
            }
        });

        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Ottieni il modal per i video
        var modalVideo = document.getElementById("myModalVideo");
        var modalVideoContent = document.getElementById("video01");
        var videos = document.querySelectorAll(".videos video");

        videos.forEach(function(video) {
            video.onclick = function() {
                modalVideo.style.display = "block";
                modalVideoContent.src = this.querySelector("source").src;
            }
        });

        var spanVideo = document.getElementsByClassName("close-video")[0];
        spanVideo.onclick = function() {
            modalVideo.style.display = "none";
                modalVideoContent.pause(); // Pausa il video quando il modal viene chiuso
                modalVideoContent.src = ""; // Resetta la sorgente del video
        }
    </script>

</body>
</html>

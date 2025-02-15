<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News - G.S. Minori</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="news.css">
</head>
<body>
    <!-- Header -->
    <?php include 'header.html'?>

    <main>
        <h1 id="ultime_news">Ultime News</h1>
        <section class="news-articles">
            <!-- Le news saranno caricate dinamicamente qui -->
        </section>

        <h1 id="foto_gallery">Foto Gallery</h1>
        <section class="photo-gallery">
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
                    <img src="photo_photo-gallery/photo1.jpg" alt="Foto 1">
                    <img src="photo_photo-gallery/photo2.jpg" alt="Foto 2">
                    <img src="photo_photo-gallery/photo3.jpg" alt="Foto 3">
                    <!-- Aggiungi altre immagini qui -->
                </div>
            </div>
        </section>

        <h1 id="video">Video Gallery</h1>
        <section class="video-gallery">
            <div class="video-wrapper">
                <div class="videos">
                    <video controls>
                        <source src="video_video-gallery/video1.mp4" type="video/mp4">
                        Il tuo browser non supporta il tag video.
                    </video>
                    <video controls>
                        <source src="video_video-gallery/video2.mp4" type="video/mp4">
                        Il tuo browser non supporta il tag video.
                    </video>
                    <!-- Aggiungi altri video qui -->
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'footer.html'?>

    <!--Caricare le news all'avvio-->
    <script>
        function caricaNews() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'news.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    var newsHtml = '';
                    data.forEach(function(news) {
                        newsHtml += `
                            <article>
                                <img src="${news.immagine}" alt="${news.titolo}">
                                <h2>${news.titolo}</h2>
                                <p>${news.descrizione}</p>
                                <p><small>Pubblicato il: ${new Date(news.data_pubblicazione).toLocaleDateString()}</small></p>
                                <a href="#" class="read-more" data-id="${news.id}" data-title="${news.titolo}" data-image="${news.immagine}" data-content="${news.contenuto}">Leggi di più...</a>
                            </article>
                        `;
                    });
                    document.querySelector('.news-articles').innerHTML = newsHtml;

                    // Aggiungi evento click per i link "Leggi di più..."
                    document.querySelectorAll('.read-more').forEach(function(element) {
                        element.addEventListener('click', function(event) {
                            event.preventDefault();
                            var title = this.getAttribute('data-title');
                            var image = this.getAttribute('data-image');
                            var content = this.getAttribute('data-content');

                            document.getElementById('modalTitle').textContent = title;
                            document.getElementById('modalImage').src = image;
                            document.getElementById('modalContent').textContent = content;

                            document.getElementById('newsModal').style.display = 'block';
                        });
                    });
                }
            };
            xhr.send();
        }

        document.addEventListener('DOMContentLoaded', function() {
            caricaNews();
        });

        // Chiudi il modal quando si clicca sulla X
        document.querySelectorAll('.close').forEach(function(element) {
            element.addEventListener('click', function() {
                element.closest('.modal').style.display = 'none';
            });
        });

        // Chiudi il modal quando si clicca fuori dal modal
        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        });

        // JavaScript per l'ingrandimento delle immagini
        var modal = document.getElementById('myModal');
        var modalImg = document.getElementById('img01');
        var images = document.querySelectorAll('.gallery img');

        images.forEach(function(image) {
            image.onclick = function() {
                modal.style.display = 'block';
                modalImg.src = this.src;
            };
        });

        // JavaScript per l'ingrandimento dei video
        var modalVideo = document.getElementById('myModalVideo');
        var modalVideoContent = document.getElementById('video01');
        var videos = document.querySelectorAll('.videos video');

        videos.forEach(function(video) {
            video.onclick = function() {
                modalVideo.style.display = 'block';
                modalVideoContent.src = this.querySelector('source').src;
            };
        });

        var spanVideo = document.getElementsByClassName('close-video')[0];
        spanVideo.onclick = function() {
            modalVideo.style.display = 'none';
            modalVideoContent.pause(); // Pausa il video quando il modal viene chiuso
            modalVideoContent.src = ''; // Resetta la sorgente del video
        };
    </script>

    <!-- Gestione Modal -->
    <!-- Modal per l'ingrandimento delle immagini -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content">
            <img id="img01" alt="">
        </div>
    </div>

    <!-- Modal per l'ingrandimento dei video -->
    <div id="myModalVideo" class="modal-video">
        <span class="close-video">&times;</span>
        <div class="modal-video-content">
            <video id="video01" controls>
                <source src="" type="video/mp4">
            </video>
        </div>
    </div>

    <!-- Modal per l'ingrandimento delle news -->
    <div id="newsModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content">
            <h2 id="modalTitle"></h2>
            <img id="modalImage" src="" alt="">
            <p id="modalContent"></p>
        </div>
    </div>
</body>
</html>
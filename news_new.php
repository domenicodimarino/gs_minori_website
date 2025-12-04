<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News - G.S. Minori</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> <!-- Inserimento delle icone -->
    <link rel="stylesheet" href="news.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'?>
    <?php
    include 'db.php'; 
    ?>


    <main>
        <h1 id="ultime_news">Ultime News</h1>
        <section class="news-articles">
            <!-- Le news saranno caricate dinamicamente qui -->
        </section>
       <h1 id="foto_gallery">Foto Gallery</h1>

<section class="photo-gallery home-photo-gallery">
    <div class="gallery-wrapper">
        <div class="gallery">
            <?php
            $stagioneCorrente = 2025; // stagione corrente 2025/26

            $sqlPreview = "
                SELECT immagine, didascalia
                FROM immagini_newa
                WHERE stagione_small = $1 AND archivio = false
                ORDER BY COALESCE(data_foto, CURRENT_DATE) DESC, id DESC
                LIMIT 8
            ";
            $resPrev = pg_query_params($db, $sqlPreview, [$stagioneCorrente]);

            while ($row = pg_fetch_assoc($resPrev)) {
                $src = htmlspecialchars($row['immagine']);
                $did = htmlspecialchars($row['didascalia']);
                echo '
                <a class="preview-thumb" href="photo_gallery.php?stagione=' . $stagioneCorrente . '">
                    <img src="' . $src . '" alt="' . $did . '">
                </a>';
            }
            ?>
        </div>
    </div>

    <p class="link-gallery-completa">
        <a href="photo_gallery.php" class="btn-gallery">
            Vai alla gallery completa &rarr;
        </a>
    </p>
</section>



        <!-- Suddivisione in categorie dei video -->
        <h1 id="video">Video Gallery</h1>
        <nav class="sub-nav">
            <a href="#tutto" class="nav-link1" data-target="all-section">TUTTI I VIDEO</a>
            <a href="#highlights" class="nav-link1" data-target="highlights-section">HIGHLIGHTS</a>
            <a href="#fan" class="nav-link1" data-target="fan-section">I NOSTRI FAN</a>
        </nav>

        <section class="video-gallery">
            <div class="video-wrapper">
                <div class="videos">

                    <div id="all-section" class="section">
                        <video controls>
                            <source src="video_video-gallery/video1.mp4" type="video/mp4">
                            Il tuo browser non supporta il tag video.
                        </video>
                        <video controls>
                            <source src="video_video-gallery/video2.mp4" type="video/mp4">
                            Il tuo browser non supporta il tag video.
                        </video>
                        <video controls>
                            <source src="video_video-gallery/video4.mp4" type="video/mp4">
                            Il tuo browser non supporta il tag video.
                        </video>
                        <video controls>
                            <source src="video_video-gallery/video5.mp4" type="video/mp4">
                            Il tuo browser non supporta il tag video.
                        </video>
                    </div>

                    <div id="highlights-section" class="section" style="display: none;">
                        <video controls>
                            <source src="video_video-gallery/video1.mp4" type="video/mp4">
                            Il tuo browser non supporta il tag video.
                        </video>
                        <video controls>
                            <source src="video_video-gallery/video2.mp4" type="video/mp4">
                            Il tuo browser non supporta il tag video.
                        </video>
                    </div>

                    

                    <div id="fan-section" class="section" style="display: none;">
                        <video controls>
                            <source src="video_video-gallery/video4.mp4" type="video/mp4">
                            Il tuo browser non supporta il tag video.
                        </video>
                        <video controls>
                            <source src="video_video-gallery/video5.mp4" type="video/mp4">
                            Il tuo browser non supporta il tag video.
                        </video>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'footer.html'?>

    <!-- Modal per l'ingrandimento delle immagini -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content">
            <div class="modal-arrows">
            <span class="prev">&lt;</span>
            <img id="img01" alt="">
            <span class="next">&gt;</span>
            </div>
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

    <!-- Script per la gestione delle news e dei modali -->
    <script>
        // Carica le news dinamicamente
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
    
                            document.getElementById('newsModal').style.display = 'flex';
                        });
                    });
                }
            };
            xhr.send();
        }
    
        document.addEventListener('DOMContentLoaded', function() {
            caricaNews();
        });
    
        // Funzione per chiudere un modal
        function chiudiModal(modal) {
            if (modal) {
                var video = modal.querySelector('video');
                if (video) {
                    video.pause();
                    video.currentTime = 0;
                }
                modal.style.display = 'none';
            }
        }
    
        // Aggiungi event listener per tutti i pulsanti di chiusura (per .close e .close-video)
        document.querySelectorAll('.close, .close-video').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var modal = this.closest('.modal') || this.closest('.modal-video');
                chiudiModal(modal);
            });
        });
    
        // Chiudi il modal cliccando fuori dal contenuto
        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal') || event.target.classList.contains('modal-video')) {
                chiudiModal(event.target);
            }
        });
    
        // Ingrandimento delle immagini con doppio click
        var modalImgModal = document.getElementById('myModal');
        var modalImgElement = document.getElementById('img01');
        var galleryImages = document.querySelectorAll('.gallery img');
        var currentIndex = 0;

        function showImage(index) {
            if (index >= 0 && index < galleryImages.length) {
                modalImgElement.src = galleryImages[index].src;
                currentIndex = index;
                modalImgModal.style.display = 'flex';
            }
        }

        galleryImages.forEach(function(img, index) {
            img.addEventListener('click', function() {
                showImage(index);
            });
        });

        document.querySelector('.prev').addEventListener('click', function() {
            showImage(currentIndex - 1);
        });

        document.querySelector('.next').addEventListener('click', function() {
            showImage(currentIndex + 1);
        });

        // Il modal viene chiuso cliccando fuori dal contenuto
        window.addEventListener('click', function(event) {
            if (event.target === modalImgModal) {
                modalImgModal.style.display = 'none';
            }
        });
    
        // Ingrandimento dei video (evento click)
        var modalVideo = document.getElementById('myModalVideo');
        var modalVideoContent = document.getElementById('video01');
        var videos = document.querySelectorAll('.videos video');
    
        videos.forEach(function(video) {
            video.addEventListener('click', function() {
            modalVideo.style.display = 'none';
            modalVideoContent.src = this.querySelector('source').src;
            });
        });
        // Il modal dei video viene chiuso tramite il pulsante di chiusura
        var spanVideo = document.getElementsByClassName('close-video')[0];
        spanVideo.addEventListener('click', function() {
            chiudiModal(modalVideo);
            modalVideoContent.pause();
            modalVideoContent.src = '';
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.sub-nav .nav-link1');
            const videoSections = document.querySelectorAll('.video-gallery .section');

            navLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const target = this.getAttribute('data-target');

                    navLinks.forEach(link => link.classList.remove('active'));

                    // Si aggiunge la classe active al link cliccato
                    this.classList.add('active');

                    // Mostra solo la sezione corrispondente al link cliccato
                    videoSections.forEach(section => {
                        if (section.id === target) {
                            section.style.display = 'flex';
                        } else {
                            section.style.display = 'none';
                        }
                    });
                });
            });

            // Mostra la sezione "TUTTI I VIDEO" per default
            const defaultLink = document.querySelector('.sub-nav .nav-link1[data-target="all-section"]');
            if (defaultLink) {
                defaultLink.classList.add('active');
                document.getElementById('all-section').style.display = 'flex';
            }
        });
    </script>
</body>
</html>

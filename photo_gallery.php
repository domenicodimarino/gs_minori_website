<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto Gallery - G.S. Minori</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="news.css">
    <link rel="stylesheet" href="photo_gallery.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php
    include 'db.php'; // crea $db

    $stagione   = isset($_GET['stagione']) ? (int)$_GET['stagione'] : null;
    $categoria  = isset($_GET['categoria']) ? $_GET['categoria'] : null;
    $isArchivio = isset($_GET['archivio']) ? true : false;
    ?>

    <main>
        <h1 id="foto_gallery">Foto Gallery</h1>

        <?php
       

        // ===== LIVELLO 1: elenco stagioni + Archivio =====
        if (!$stagione && !$isArchivio) {

            echo '<section class="gallery-seasons">';
            echo '<h2>Scegli una stagione</h2>';

            $sqlStagioni = "
                SELECT DISTINCT stagione_small 
                FROM immagini_newa
                WHERE stagione_small IS NOT NULL AND archivio = false
                ORDER BY stagione_small DESC
            ";
            $result = pg_query($db, $sqlStagioni);

            echo '<div class="card-container">';
            while ($row = pg_fetch_assoc($result)) {
                $stag = (int)$row['stagione_small'];
                $label = $stag . ' / ' . ($stag + 1);
                echo '
                <a class="card stagione-card" href="photo_gallery.php?stagione=' . $stag . '">
                    <h3>Stagione ' . $label . '</h3>
                </a>';
            }

            // Card Archivio
            echo '
                <a class="card stagione-card archivio-card" href="photo_gallery.php?archivio=1">
                    <h3>Archivio storico</h3>
                    <p>Vecchie squadre, articoli, ricordi del GSM</p>
                </a>';

            echo '</div>';
            echo '</section>';
        }

        // ===== LIVELLO 2: elenco categorie per una stagione =====
        elseif ($stagione && !$categoria) {

            echo '<section class="gallery-categories">';
            $labelStag = $stagione . ' / ' . ($stagione + 1);
            echo '<h2>Stagione ' . $labelStag . ' – Scegli una squadra</h2>';

            $sqlCat = "
                SELECT DISTINCT categoria 
                FROM immagini_newa
                WHERE stagione_small = $1 AND archivio = false
                ORDER BY categoria
            ";
            $result = pg_query_params($db, $sqlCat, [$stagione]);

            echo '<div class="card-container">';
            while ($row = pg_fetch_assoc($result)) {
                $cat = htmlspecialchars($row['categoria']);
                echo '
                <a class="card categoria-card" href="photo_gallery.php?stagione=' . $stagione . '&categoria=' . urlencode($cat) . '">
                    <h3>' . $cat . '</h3>
                </a>';
            }
            echo '</div>';

            echo '<p class="back-link"><a href="photo_gallery.php">&larr; Torna alle stagioni</a></p>';

            echo '</section>';
        }

        // ===== LIVELLO 3: media di una categoria in una stagione =====
        elseif ($stagione && $categoria) {

            $labelStag = $stagione . ' / ' . ($stagione + 1);
            echo '<section class="gallery-media">';
            echo '<h2>' . htmlspecialchars($categoria) . ' – Stagione ' . $labelStag . '</h2>';

            $sqlMedia = "
                SELECT id, immagine, didascalia, tipo_media, video_url
                FROM immagini_newa
                WHERE stagione_small = $1 
                  AND categoria = $2
                  AND archivio = false
                ORDER BY COALESCE(data_foto, CURRENT_DATE), id
            ";
            $result = pg_query_params($db, $sqlMedia, [$stagione, $categoria]);

            echo '<div class="gallery-grid">';
            while ($row = pg_fetch_assoc($result)) {
                $id = (int)$row['id'];
                $src = htmlspecialchars($row['immagine']); // path o gestito da uno script
                $did = htmlspecialchars($row['didascalia']);
                $tipo = $row['tipo_media'];
                $videoUrl = $row['video_url'];

                if ($tipo === 'video' && !empty($videoUrl)) {
                    echo '
                    <div class="gallery-item video-item">
                        <a href="' . htmlspecialchars($videoUrl) . '" target="_blank">
                            <div class="video-thumb">
                                <i class="fa-solid fa-play"></i>
                            </div>
                            <p class="caption">' . $did . '</p>
                        </a>
                    </div>';
                } else {
                    echo '
                    <div class="gallery-item">
                        <img src="' . $src . '" alt="' . $did . '" 
                             data-caption="' . $did . '">
                    </div>';
                }
            }
            echo '</div>';

            echo '<p class="back-link"><a href="photo_gallery.php?stagione=' . $stagione . '">&larr; Torna alle squadre</a></p>';
            echo '</section>';
        }

        // ===== VISTA ARCHIVIO =====
        elseif ($isArchivio) {
            echo '<section class="gallery-archivio">';
            echo '<h2>Archivio storico</h2>';
            echo '<p>Vecchie foto di squadre, articoli, ricordi dei 50 anni del G.S. Minori.</p>';

            $sqlArch = "
                SELECT id, immagine, didascalia, categoria
                FROM immagini_newa
                WHERE archivio = true
                ORDER BY categoria, id
            ";
            $result = pg_query($db, $sqlArch);

            echo '<div class="gallery-grid">';
            while ($row = pg_fetch_assoc($result)) {
                $src = htmlspecialchars($row['immagine']);
                $did = htmlspecialchars($row['didascalia']);
                $cat = htmlspecialchars($row['categoria']);

                echo '
                <div class="gallery-item">
                    <img src="' . $src . '" alt="' . $did . '" 
                         data-caption="' . $did . ' (' . $cat . ')">
                </div>';
            }
            echo '</div>';

            echo '<p class="back-link"><a href="photo_gallery.php">&larr; Torna alle stagioni</a></p>';

            echo '</section>';
        }

        pg_close($db);
        ?>

        <!-- Modale per ingrandire foto + didascalia -->
        <div id="photoModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <img id="modalImage" src="" alt="">
                <p id="modalCaption"></p>
            </div>
        </div>
    </main>

    <?php include 'footer.html'; ?>

    <script>
    // Lightbox semplice per le foto
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('photoModal');
        const modalImg = document.getElementById('modalImage');
        const modalCap = document.getElementById('modalCaption');
        const closeBtn = document.querySelector('#photoModal .close');

        document.querySelectorAll('.gallery-item img').forEach(function(img) {
            img.addEventListener('click', function() {
                modal.style.display = 'flex';
                modalImg.src = this.src;
                modalCap.textContent = this.getAttribute('data-caption') || this.alt;
            });
        });

        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
    </script>
</body>
</html>

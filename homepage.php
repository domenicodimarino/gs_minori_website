<?php include 'header.php'; ?>
<?php require 'db.php'; ?>
<html>
    <head>
        <title>GS Minori - Sito ufficiale</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="homepage_assets/homepage.css" type="text/css"/>
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        
    </head>
    <body>
    <img src="photo/photo_homepage/fogliobianco.jpg" id="sfondo" alt="sfondo" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; opacity:0.25;">
<main>
    <section id="homepage-links">
        <h1>Benvenuto sul sito ufficiale del GS Minori</h1>
        <p>Scopri tutte le sezioni del sito e immergiti nella nostra storia, nelle notizie, nei team e molto altro!</p>
        
        <h1 id="ultime_news">Ultima News</h1>
            <section class="news-articles">
            <!-- Le news saranno caricate dinamicamente qui -->
        </section>
        
            <section class="stagione">
            <section class="calendario-classifica">
            <section class="calendario">
            <div id="prossima-partita-container">
                <!-- I dati della prossima partita verranno caricati qui -->
                <iframe src="homepage_assets/prossima_partita_iframe.php" id="prossima-partita-iframe" style="width: 100%; height: 220px; border: none;"></iframe>
            </div>
            </section>
            
            <section class="classifica">
            <div id="classifica-container">
                <!-- La classifica verrà caricata qui -->
                <iframe src="homepage_assets/classifica_iframe.php" id="classifica-iframe" style="width: 100%; height: 300px; border: none;"></iframe>
            </div>
            </section>
            </section>
            <section class="descrizione-stagione">
                <h2>Stagione</h2>
                <h3>Scopri il calendario e la classifica della stagione in corso.</h3>
                <p>Per guardare la classifica completa e i risultati, vai alla sezione "Stagione"</p>
                <!-- Stagione Card -->
                <div class="home-links">
                <div class="home-card">
                    <div class="card-icon"><i class="fa-solid fa-calendar-alt"></i></div>
                    <div class="card-title">Stagione</div>
                    <div class="card-preview">
                        Calendario<br>
                        e Classifica.
                    </div>
                    <a href="stagione.php" class="card-link">Vai alla Stagione</a>
                </div>
                </div>
            </section>
        </section>
        
        <h1 id="foto_gallery">Foto Gallery</h1>
        <h2>Per vedere tutte le foto e video, clicca <a href="news_new.php#foto_gallery">qui.</a></h2>
        <section class = "photo_gallery">
        <div class="gallery-wrapper">
                <div class="gallery">
                    <img src="photo/photo_photo-gallery/photo1.jpg" alt="Foto 1">
                    <img src="photo/photo_photo-gallery/photo2.jpg" alt="Foto 2">
                    <img src="photo/photo_photo-gallery/photo3.jpg" alt="Foto 3">
                    <img src="photo/photo_photo-gallery/photo4.jpg" alt="Foto 4">
                    <img src="photo/photo_photo-gallery/photo5.jpg" alt="Foto 5">
                </div>
            </div>
        </section>
        <h1 id="shop-gallery">I prodotti del nostro shop</h1>
        <section class = "photo_gallery">
        <div class="gallery-wrapper">
                <div class="gallery">
                    <!-- Shop Card -->
                    <div class="home-links">
                    <div class="home-card">
                        <div class="card-icon"><i class="fa-solid fa-store"></i></div>
                        <div class="card-title">Shop</div>
                        <div class="card-preview">
                            Per comprare questi articoli, clicca sul tasto qui sotto!
                        </div>
                        <a href="shop.php" class="card-link">Vai allo Shop</a>
                    </div>
                    </div>
                    <img src="photo/photo_shop/canotta_avanti_home.jpeg" alt="Foto 1">
                    <img src="photo/photo_shop/canotta_avanti_away.jpeg" alt="Foto 2">
                    <img src="photo/photo_shop/pant_avanti_home.jpeg" alt="Foto 3">
                    <img src="photo/photo_shop/pant_avanti_away.jpeg" alt="Foto 4">
                    <img src="photo/photo_shop/felpa_cappuccio_avanti.jpeg" alt="Foto 5">
                    <img src="photo/photo_shop/felpa_nocap_avanti.jpeg" alt="Foto 1">
                    <img src="photo/photo_shop/pant_nocap.jpeg" alt="Foto 2">
                    <img src="photo/photo_shop/coprimaglia_avanti.jpeg" alt="Foto 3">
                    <img src="photo/photo_shop/giubbino_avanti.jpeg" alt="Foto 4">
                    <img src="photo/photo_shop/zaino_avanti.jpg" alt="Foto 5">
                    
                </div>
            </div>
        </section>
        <h1>Vieni a conoscere la storia del nostro club e i nostri teams!</h1>
        <div class="home-links">
            <!-- Club Card -->
            <div class="home-card">
                <div class="card-icon"><i class="fa-solid fa-building"></i></div>
                <div class="card-title">Club</div>
                <div class="card-preview">
                    Chi Siamo,<br>
                    Staff e Storia.
                </div>
                <a href="club.php" class="card-link">Vai al Club</a>
            </div>
            <!-- Teams Card -->
            <div class="home-card">
                <div class="card-icon"><i class="fa-solid fa-users"></i></div>
                <div class="card-title">Teams</div>
                <div class="card-preview">
                    DR2, U19,<br>
                    U17, U13.
                </div>
                <a href="teams.php" class="card-link">Vai ai Teams</a>
            </div>
        
            
        </div>
        <section id="riservata" style="display:none;">
        <h1 style="margin-top:30px; margin-bottom:30px;">Posta un contenuto sulla FanZone o vai a vedere cosa dicono gli altri!</h1>
        <div class="home-links">
             

        <section id="community">
            <h2>Community</h2>
            <p>Unisciti alla nostra community di fan e partecipa alle discussioni.</p>
            <!-- Aggiungi qui ulteriori dettagli sulla community -->
            <form action="post_content.php" method="post" id="postForm" enctype="multipart/form-data">
            <label for="username">Nome utente:</label><br>

            <input type="text" id="username" name="nome_utente" value="<?php echo htmlspecialchars($user); ?>" required readonly>

            <br><br><label for="content">Posta un contenuto:</label><br>
            <textarea id="content" name="content" rows="4" cols="50" required></textarea><br>
            <label for="image">Carica un'immagine:</label><br>
            <input type="file" id="image" name="image" accept="image/*"><br>
            <div id="dropZone">Trascina qui l'immagine</div>
            <input type="submit" value="Posta" id="submitBtn">
            <p id="errorMessage" style="color: red; display: none;">Inserire nome utente</p>
            </form>

            
        </section>


             <section class="fanzone-links">
             <!-- Fan Card -->
            <div class="home-card">
                <div class="card-icon"><i class="fa-solid fa-heart"></i></div>
                    <div class="card-title">Fan</div>
                    <div class="card-preview">
                        Entra nella FanZone!
                    </div>
                    <a href="fan.php" class="card-link">Vai ai Fan</a>
            </div>
            <!-- Concorsi Card -->
            <div class="home-card">
                <div class="card-icon"><i class="fa fa-trophy"></i></div>
                    <div class="card-title">Concorsi</div>
                    <div class="card-preview">
                        Partecipa ai concorsi!
                    </div>
                    <a href="fan.php#concorsi" class="card-link">Vai ai Concorsi</a>
            </div>
            </section>
        </div>
        </section>
                <h1 style="margin-top:30px; margin-bottom:30px;" id="guest_paragraph"> Entra a far parte della nostra Fan Base! </h1>
                <div class="home-links" id="solo_ospiti">
                <!-- Fan Card -->
                <div class="home-card">
                    <div class="card-icon"><i class="fa-solid fa-heart"></i></div>
                    <div class="card-title">Fan</div>
                    <div class="card-preview">
                        Entra nella FanZone!
                    </div>
                <a href="fan.php" class="card-link">Effettua il login e vai a fan</a>
                </div>
                <!-- Concorsi Card -->
                <div class="home-card">
                    <div class="card-icon"><i class="fa fa-trophy"></i></div>
                        <div class="card-title">Concorsi</div>
                        <div class="card-preview">
                            Partecipa ai concorsi!
                        </div>
                        <a href="fan.php#concorsi" class="card-link">Effettua il login e vai ai Concorsi</a>
                </div>
            </div>
        </div>
    </section>
</main>

        <?php include 'footer.html'?>
    </body>
    <script src="homepage_assets/homepage.js"> </script>
    <script src="homepage_assets/homepage_lastnews.js"> </script>
    <script src="homepage_assets/homepage_community.js"> </script>
</html>
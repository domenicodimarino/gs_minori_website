<?php include 'header.php'; ?>
<html>
    <head>
        <title>GS Minori - Sito ufficiale</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="homepage.css" type="text/css"/>
    </head>
    <body>
    
<main>
    <section id="homepage-links">
        <h1>Benvenuto sul sito ufficiale del GS Minori</h1>
        <p>Scopri tutte le sezioni del sito e immergiti nella nostra storia, nelle notizie, nei team e molto altro!</p>
        <div class="home-links">
            <!-- News Card -->
            <div class="home-card">
                <div class="card-icon"><i class="fa-solid fa-newspaper"></i></div>
                <div class="card-title">News</div>
                <div class="card-preview">
                    Ultime notizie,<br>
                    Photo Gallery e Video.
                </div>
                <a href="news_new.php" class="card-link">Vai a News</a>
            </div>
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
            <!-- Stagione Card -->
            <div class="home-card">
                <div class="card-icon"><i class="fa-solid fa-calendar-alt"></i></div>
                <div class="card-title">Stagione</div>
                <div class="card-preview">
                    Calendario<br>
                    e Classifica.
                </div>
                <a href="stagione.php" class="card-link">Vai alla Stagione</a>
            </div>
            <!-- Shop Card -->
            <div class="home-card">
                <div class="card-icon"><i class="fa-solid fa-store"></i></div>
                <div class="card-title">Shop</div>
                <div class="card-preview">
                    Articoli<br>
                    da acquistare.
                </div>
                <a href="shop.php" class="card-link">Vai allo Shop</a>
            </div>
            <!-- Fan Card -->
            <div class="home-card" style="display:none">
                <div class="card-icon"><i class="fa-solid fa-heart"></i></div>
                <div class="card-title">Fan</div>
                <div class="card-preview">
                    Community<br>
                    e concorsi.
                </div>
                <a href="fan.php" class="card-link">Vai ai Fan</a>
            </div>
        </div>
                <h1 style="margin-top:30px; margin-bottom:30px;" id="guest_paragraph"> Per accedere a queste altre sezioni, devi essere autenticato. </h1>
                <div class="home-links" id="solo_ospiti">
                <div class="home-card">
                    <div class="card-icon"><i class="fa-solid fa-heart"></i></div>
                    <div class="card-title">Fan</div>
                    <div class="card-preview">
                        Community<br>
                        e concorsi.
                    </div>
                <a href="fan.php" class="card-link">Effettua il login e vai a fan</a>
                </div>
            </div>
        </div>
    </section>
</main>

        <?php include 'footer.html'?>
    </body>
    <script src="homepage.js"></script>
</html>
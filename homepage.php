<?php include 'header.php'; ?>
<html>
    <head>
        <title>GS Minori - Sito ufficiale</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style>
        /* Stili specifici per la homepage */
        main {
            padding: 40px 20px;
            text-align: center;
        }
        #homepage-links {
            margin-top: 20px;
        }
        #homepage-links h1 {
            font-size: 36px;
            margin-bottom: 10px;
            color: #7e1710;
        }
        #homepage-links p {
            font-size: 18px;
            margin-bottom: 40px;
        }
        .home-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .home-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 200px;
            text-decoration: none;
            color: #090808;
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .home-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
        }
        .card-icon {
            font-size: 40px;
            color: #0d1459;
            margin-bottom: 10px;
        }
        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card-preview {
            font-size: 14px;
            margin-bottom: 15px;
            color: #555;
        }
        .card-link {
            text-decoration: none;
            background: #0d1459;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.2s;
        }
        .card-link:hover {
            background: #7e1710;
        }
    </style>
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
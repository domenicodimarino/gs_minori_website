<?php include 'header.php'; ?>
<?php require 'db.php'; ?>
<html>
    <head>
        <title>GS Minori - Sito ufficiale</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="homepage_newversion.css" type="text/css"/>
    </head>
    <body>
    <img src="fogliobianco.jpg" id="sfondo" alt="sfondo" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1; opacity:0.25;">
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
                <iframe src="prossima_partita_iframe.php" id="prossima-partita-iframe" style="width: 100%; height: 220px; border: none;"></iframe>
            </div>
            </section>
            
            <section class="classifica">
            <div id="classifica-container">
                <!-- La classifica verrà caricata qui -->
                <iframe src="classifica_iframe.php" id="classifica-iframe" style="width: 100%; height: 300px; border: none;"></iframe>
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
                <h1 style="margin-top:30px; margin-bottom:30px;" id="guest_paragraph"> Entra a far parte della nostra Fan Base! </h1>
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
    <script>
        function caricaNews() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'news.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    if (data.length > 0) {
                        var latestNews = data[0]; // Assuming the latest news is the first item in the array
                        var newsHtml = `
                            <article>
                                <img src="${latestNews.immagine}" alt="${latestNews.titolo}">
                                <section class="descrizione-articolo">
                                    <h2>${latestNews.titolo}</h2>
                                    <p>${latestNews.descrizione}</p>
                                    <p><small>Pubblicato il: ${new Date(latestNews.data_pubblicazione).toLocaleDateString()}</small></p>
                                    <h3>Per saperne di più, vai alla sezione News cliccando qui sotto!</h3>
                                    <!-- News Card -->
                                    <div class="home-links">
                                    <div class="home-card">
                                        <div class="card-icon"><i class="fa-solid fa-newspaper"></i></div>
                                        <div class="card-title">News</div>
                                        <div class="card-preview">
                                            Ultime notizie,<br>
                                            Photo Gallery e Video.
                                        </div>
                                        <a href="news_new.php" class="card-link">Vai a News</a>
                                    </div>
                                    </div>
                                </section>
                            </article>
                        `;
                        document.querySelector('.news-articles').innerHTML = newsHtml;
                    }
                }
            };
            xhr.send();
        }

        document.addEventListener('DOMContentLoaded', function() {
            caricaNews();
        });
    </script>
</html>
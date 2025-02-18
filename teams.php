<html>
    <head>
        <title>Teams</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="teams.css" type="text/css"/>
    </head>

    <?php include 'header.php'; ?>
    
    <body>
        
        <nav class="main-nav">
            <a href="teams.php" class="nav-link">PRIMA SQUADRA MASCHILE</a>
            <a href="u19silver.php" class="nav-link"> U19 SILVER</a> 
            <a href="u17libertas.php" class="nav-link"> U17 LIBERTAS</a> 
            <a href="u13libertas.php" class="nav-link"> U13 LIBERTAS</a> 
            <a href="minibasket.php" class="nav-link"> MINIBASKET</a>
        </nav>
        <div class="roster"><h2>PRIMA SQUADRA MASCHILE</h2></div> <br>
        <nav class="sub-nav">
            <a href="#" class="nav-link1" data-target="all-section"> TUTTI</a>
            <a href="#playmaker" class="nav-link1" data-target="playmaker-section"> PLAYMAKER</a> 
            <a href="#guardia" class="nav-link1" data-target="guardia-section"> GUARDIA</a> 
            <a href="#alapiccola" class="nav-link1" data-target="alapiccola-section"> ALA PICCOLA</a>
            <a href="#alagrande" class="nav-link1" data-target="alagrande-section"> ALA GRANDE</a>
            <a href="#centro" class="nav-link1" data-target="centro-section"> CENTRO</a>
            <a href="#allenatore" class="nav-link1" data-target="allenatore-section"> ALLENATORE</a>
        </nav>
        <br>
        <img src="primasquadra.png" alt="immagine" class="team-image">
        <div class="roster-title"> <strong>Roster DR2</strong><br> Rosa ufficiale della stagione 2024/25</div>
        
        <div id="playmaker-section" class="section">
            <div class="position-title1"> <h2>PLAYMAKER</h2>
                <div id="playmaker" class="sec_img">
                    <div class="image-container">
                        <img src="photo_teams/alemammato.png" alt="immagine" class="image">
                        <div class="text"> 34 <br> Alessandro  <br>Mammato</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="guardia-section" class="section" style="display: none;">
            <div class="position-title"> <h2>GUARDIA</h2>
                <div id="guardia" class="sec_img">
                    <div class="image-container">
                        <img src="photo_teams/cristian.jpg" alt="immagine" class="image">
                        <div class="text"> 17 <br>Cristian <br>Cantilena</div>
                    </div>
                    <div class="image-container">
                        <img src="photo_teams/gennaro.jpg" alt="immagine" class="image">
                        <div class="text"> 13 <br>Gennaro <br>Infante</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="alapiccola-section" class="section" style="display: none;">
            <div class="position-title"><h2>ALA PICCOLA</h2>
                <div id="alapiccola" class="sec_img">
                    <div class="image-container">
                        <img src="photo_teams/alfonso_fusco.jpg" alt="immagine" class="image">
                        <div class="text"> 15 <br>Alfonso <br>Fusco</div>
                    </div>
                    <div class="image-container">
                        <img src="photo_teams/danilo.jpg" alt="immagine" class="image">
                        <div class="text"> 30 <br>Danilo <br>Galibardi</div>
                    </div>
                    <div class="image-container">
                        <img src="photo_teams/gabriele.jpg" alt="immagine" class="image">
                        <div class="text"> 10 <br>Gabriele <br>Di Lieto</div>
                    </div>
                    <div class="image-container">
                        <img src="photo_teams/manuel.jpg" alt="immagine" class="image">
                        <div class="text"> 77 <br>Manuel <br>Proto</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="alagrande-section" class="section" style="display: none;">
            <div class="position-title"><h2>ALA GRANDE</h2>
                <div id="alagrande" class="sec_img">
                    <div class="image-container">
                        <img src="photo_teams/giacinto.jpg" alt="immagine" class="image">
                        <div class="text">11 <br> Giacinto <br>Spinaccio</div>
                    </div>
                    <div class="image-container">
                        <img src="photo_teams/vlad.jpg" alt="immagine" class="image">
                        <div class="text">23 <br> Vlad <br>Laptyev</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="centro-section" class="section" style="display: none;">
            <div class="position-title"><h2>CENTRO</h2>
                <div id="centro" class="sec_img">
                    <div class="image-container">
                        <img src="photo_teams/alessio.jpg" alt="immagine" class="image">
                        <div class="text"> 7 <br>Alessio <br>Proto</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="allenatore-section" class="section">
            <div class="position-title"><h2>ALLENATORE</h2>
                <div class="coach_container"> 
                    <div class="text2">
                        <div class="image1">
                            <img src="photo_teams/jacopo.png" alt="Jacopo Porpora" class="coach-image">
                        </div>
                        <div class="info" id="allenatore">
                            <h1>Jacopo Porpora</h1><br>
                            <p><span class="bold">Data di nascita:</span> 23 novembre 1994</p> <br>
                            <p><span class="bold">Luogo di nascita:</span> Salerno</p> <br>
                            <p><span class="bold">Nazionalità:</span> Italia</p><br>
                            <p><span class="bold">Allenatore dal:</span> 2024</p><br>
                            <p><span class="bold">Al GSMinori dal:</span> 2024</p>
                        </div>
                        <div class="description">
                            <p> <span class="bold1">BIOGRAFIA DI JACOPO PORPORA</span> </p><br>
                            <p>Jacopo Porpora, nato il 23 novembre 1994 a Salerno, è l'allenatore della squadra di 
                                basket GSMinori. Con una forte connessione con la sua città d'origine, ha dedicato gran parte 
                                della sua carriera a guidare i giovani atleti locali, cercando di trasmettere loro non solo le 
                                abilità tecniche del gioco, ma anche il valore del lavoro di squadra e della disciplina. La sua 
                                passione per il basket e il desiderio di far crescere la squadra lo hanno reso un punto di 
                                riferimento per i ragazzi della comunità. Sempre attento a creare un ambiente di allenamento 
                                positivo e motivante, Jacopo è conosciuto per la sua capacità di adattarsi alle esigenze dei suoi giocatori, 
                                supportandoli nel loro sviluppo sia sul piano tecnico che personale. Con il suo approccio empatico e il suo 
                                impegno costante, Jacopo è riuscito a far crescere la squadra GSMinori, portando avanti la tradizione di 
                                eccellenza sportiva del suo paese.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="teams.js"></script>
        <?php include 'footer.html'; ?>
    </body>
</html>
<html>
    <head>
        <title>Teams</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style>
            .geppetto {
            display: flex;
            gap: 40px;
                width: auto;
            margin-bottom: 20px; 
            padding-left: 10px;
            padding-top: 10px;
            }

            .image-container {
            position: relative;
            width: 300px;
            height: 200px;
            }

            .image {
            width: 100%;
            height: 150%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .text-container {
            display: flex;
            gap: 25px; /* Distanza tra i blocchi di testo */
            }

            .text-block {
            width: 50%; /* Ogni blocco di testo prende metà della larghezza disponibile */
            }
            .image-container:hover {
    transform: scale(1.1);
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
}

            .text {
            position: absolute;
            top: 100%; /* Centra verticalmente */
            left: 10%; /* Centra orizzontalmente */
            transform: translate(-10%, -10%); /* Centra esattamente */
            color: white; /* Colore del testo */
            font-size: 24px; /* Dimensione del testo */
            font-weight: bold; /* Opzionale: Grassetto */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Ombra per il testo, opzionale */
            }
    

        .container:hover .image {
            transform: scale(1.1); /* Effetto zoom quando si passa sopra */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5); /* Ombra per l'immagine */
        }
           
.image1 {
    flex-shrink: 0;
    width: 250px;
    height: 250px;
    float: left;
}

.text2 {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding-left: 20px;
}

.info {
    display: flex;
    flex-direction: column;
    
}

.description {
    max-width: 600px;
    text-align: justify;
}
    </style>
    </head>
    <body>
        <?php include 'header.html'; ?>
        <nav style="text-align: center; background-color: #b0c4de; height: 50px; padding-top: 15px;">
            <a href="teams.php" style="color: inherit; text-decoration: none;">PRIMA SQUADRA MASCHILE</a> | 
            <a href="u19silver.php" style="color: inherit; text-decoration: none;"> U19 SILVER</a> | 
            <a href="u17libertas.php" style="color: inherit; text-decoration: none;"> U17 LIBERTAS</a> |
            <a href="u13libertas.php" style="color: inherit; text-decoration: none;"> U13 LIBERTAS</a> |
            <a href="minibasket.php" style="color: inherit; text-decoration: none;"> MINIBASKET</a>
        </nav>
        <div style="padding-top: 15px; margin-left: 5px;"> <Strong>PRIMA SQUADRA MASCHILE</Strong></div> <br>
        <nav style="margin-left: 5px;">
            <a href="#playmaker" style="color: inherit; text-decoration: none;"> PLAYMAKER</a> | 
            <a href="#guardia" style="color: inherit; text-decoration: none;"> GUARDIA</a> | 
            <a href="#alapiccola" style="color: inherit; text-decoration: none;"> ALA PICCOLA</a> |
            <a href="#alagrande" style="color: inherit; text-decoration: none;"> ALA GRANDE</a> |
            <a href="#centro" style="color: inherit; text-decoration: none;"> CENTRO</a> |
            <a href="#allenatore" style="color: inherit; text-decoration: none;"> ALLENATORE</a>
        </nav>
        <br>
        <img src="primasquadra.png" alt="immagine" style="width: 45vw; height: 35vw; display: block; margin: auto; align-items: center;">
        <div style="text-align: center; margin-top: 10px;"> <strong>Roster DR2</strong><br>Ecco la rosa ufficiale della stagione 2024/25</div>
        <p style="margin-left: 5px;">PLAYMAKER</p>
            <div id="playmaker"; style="padding-top: 15px" class="geppetto">
                    <div class="image-container">
                    <img src="alemammato.png" alt="immagine" class="image">
                    <div class="text"> 34 <br> Alessandro  <br>Mammato</div>
                    </div>
            </div>
        <p style="margin-left: 5px; padding-top:100px">GUARDIA</p>
            <div id="guardia" style="padding-top: 15px" class="geppetto">
            
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
        <p style="margin-left: 5px; padding-top: 100px">ALA PICCOLA</p>
            <div id="alapiccola" style="padding-top: 15px" class="geppetto">
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
        <p style="margin-left: 5px; padding-top: 100px">ALA GRANDE</p>
            <div id="alagrande"; class="geppetto">
                <div class="image-container">
                    <img src="photo_teams/giacinto.jpg" alt="immagine" class="image">
                    <div class="text">11 <br> Giacinto <br>Spinaccio</div>
                </div>
                <div class="image-container">
                    <img src="photo_teams/vlad.jpg" alt="immagine" class="image">
                    <div class="text">23 <br> Vlad <br>Laptyev</div>
                </div>
            </div>
        <p style="margin-left: 5px; padding-top: 100px">CENTRO</p>
            <div id="centro"; style="padding-top: 15px" class="geppetto">
                <div class="image-container">
                    <img src="photo_teams/alessio.jpg" alt="immagine" class="image">
                    <div class="text"> 7 <br>Alessio <br>Proto</div>
                </div>
            </div>
        <p style="margin-left: 5px; padding-top: 100px">ALLENATORE</p>
    

    <div class="image1" style="padding-top: 5px; margin-left: 20px;">
        <img src="jacopo.png" alt="Sérgio Conceição" style="width: 100%; height: 150%;">
    </div>
    <div class="text2">
        <div class="info" id="allenatore">
            <p class="title">Jacopo Porpora</p>
            <p><span class="bold">Data di nascita:</span> 23 novembre 1994</p>
            <p><span class="bold">Luogo di nascita:</span> Salerno</p>
            <p><span class="bold">Nazionalità:</span> Italia</p>
            <p><span class="bold">Allenatore dal:</span> 2024</p>
            <p><span class="bold">Al GSMinori dal:</span> 2024</p>
        </div>
        <div class="description">
            <p class="bold">Biografia di Jacopo Porpora</p>
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
           <?php include 'footer.html'; ?>
    </body>
</html>
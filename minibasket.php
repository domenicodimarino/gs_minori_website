<html>
    <head>
        <title>Minibasket</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style>
        #gep3{
            display: block;
            margin: auto;
            height: 35vw;
            width: 40vw;
        }
        #immagine_minibasket{
            align-items: center;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            text-align: center;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th {
            background-color: #4CAF50; /* Colore diverso per la prima riga */
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Alternanza di colori per le righe */
        }
        .share-container {
            display: flex;
            align-items: center;
            background-color: #d3d6db;
            padding: 10px;
            border-radius: 5px;
            width: fit-content;
        }
        .share-text {
            font-size: 16px;
            font-weight: bold;
            margin-right: 10px;
        }
        .share-icon {
            width: 35px;
            height: 35px;
            margin-right: 10px;
            cursor: pointer;
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
    text-align: justify;;
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
        <div style="padding-top: 15px; margin-left: 5px;"> <Strong>MINIBASKET</Strong></div> <br>
        <br>
        <div id="immagine_minibasket"> <img id="gep3" src="minibasket.png" alt="Foto Squadra"></div>
        <br>
        <div style="text-align: center"> <strong>MINIBASKET</strong><br>Ecco la rosa ufficiale della stagione 2024/25</div>
        <table>
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Anno di Nacita</th>
            <th>Ruolo</th>
            <th>Numero di Maglia</th>
        </tr>
        <tr><td>Marco</td><td>Rossi</td><td>2015</td><td>Playmaker</td><td>5</td></tr>
        <tr><td>Giulia</td><td>Bianchi</td><td>2016</td><td>Guardia</td><td>8</td></tr>
        <tr><td>Andrea</td><td>Verdi</td><td>2014</td><td>Centro</td><td>12</td></tr>
        <tr><td>Sara</td><td>Moretti</td><td>2017</td><td>Ala piccola</td><td>9</td></tr>
        <tr><td>Matteo</td><td>Ferrari</td><td>2018</td><td>Ala grande</td><td>15</td></tr>
        <tr><td>Elena</td><td>Russo</td><td>2015</td><td>Guardia</td><td>6</td></tr>
        <tr><td>Davide</td><td>Colombo</td><td>2016</td><td>Centro</td><td>13</td></tr>
        <tr><td>Francesca</td><td>Conti</td><td>2017</td><td>Playmaker</td><td>4</td></tr>
        <tr><td>Luca</td><td>De Luca</td><td>2018</td><td>Ala piccola</td><td>10</td></tr>
        <tr><td>Alessandro</td><td>Mancini</td><td>2014</td><td>Ala grande</td><td>18</td></tr>
        <tr><td>Martina</td><td>Rinaldi</td><td>2015</td><td>Playmaker</td><td>3</td></tr>
        <tr><td>Riccardo</td><td>Galli</td><td>2016</td><td>Guardia</td><td>7</td></tr>
        <tr><td>Valentina</td><td>Serra</td><td>2017</td><td>Centro</td><td>11</td></tr>
        <tr><td>Tommaso</td><td>Leone</td><td>2018</td><td>Ala piccola</td><td>14</td></tr>
        <tr><td>Alice</td><td>Pellegrini</td><td>2014</td><td>Ala grande</td><td>16</td></tr>
        <tr><td>Filippo</td><td>Marini</td><td>2015</td><td>Playmaker</td><td>2</td></tr>
        <tr><td>Chiara</td><td>Benedetti</td><td>2016</td><td>Guardia</td><td>9</td></tr>
        <tr><td>Leonardo</td><td>Gatti</td><td>2017</td><td>Centro</td><td>17</td></tr>
        <tr><td>Emma</td><td>Villa</td><td>2018</td><td>Ala piccola</td><td>20</td></tr>
        <tr><td>Gabriele</td><td>Fabbri</td><td>2014</td><td>Ala grande</td><td>1</td></tr>
    </table>
    <div class="share-container">
        <span class="share-text">CONDIVIDI SU:</span>
        <a href="https://www.instagram.com/gs.minori/" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram" class="share-icon">
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/g.s.minori.costadamalfi.1" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook" class="share-icon">
        </a>
    </div>
    <p style="margin-left: 5px; padding-top: 15px">ALLENATORE</p>
    <div class="image1" style="padding-top: 5px; margin-left: 20px;">
        <img src="jacopo.png" alt="Sérgio Conceição" style="width: 100%; height: 150%;">
    </div>
    <div class="text2">
        <div class="info">
            <p class="title">Jacopo Porpora</p>
            <p><span class="bold">Data di nascita:</span> 23 novembre 1994</p>
            <p><span class="bold">Luogo di nascita:</span> Salerno</p>
            <p><span class="bold">Nazionalità:</span> Italia</p>
            <p><span class="bold">Allenatore dal:</span> 2024</p>
            <p><span class="bold">Al Milan dal:</span> 2024</p>
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
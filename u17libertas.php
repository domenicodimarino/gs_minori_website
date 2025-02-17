<?php include 'header.php'; ?>
<html>
    <head>
        <title>U17 Libertas</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style>
        #gep1{
            display: block;
            margin: auto;
            height: 38vw;
            width: 55vw;
        }
        #immagine_u17{
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
        th {
            cursor: pointer;
            position: relative;
            padding-right: 20px; /* Spazio per la freccia */
        }
        th::after {
            content: "▲▼";
            position: absolute;
            right: 5px;
            font-size: 12px;
            color: #ccc; /* Colore grigio per le frecce inattive */
        }
        th.asc::after {
            content: "▲";
            color: #000; /* Colore nero per la freccia attiva */
        }
        th.desc::after {
            content: "▼";
            color: #000; /* Colore nero per la freccia attiva */
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
        
        <nav style="text-align: center; background-color: #b0c4de; height: 50px; padding-top: 15px;">
            <a href="teams.php" style="color: inherit; text-decoration: none;">PRIMA SQUADRA MASCHILE</a> | 
            <a href="u19silver.php" style="color: inherit; text-decoration: none;"> U19 SILVER</a> | 
            <a href="u17libertas.php" style="color: inherit; text-decoration: none;"> U17 LIBERTAS</a> |
            <a href="u13libertas.php" style="color: inherit; text-decoration: none;"> U13 LIBERTAS</a> |
            <a href="minibasket.php" style="color: inherit; text-decoration: none;"> MINIBASKET</a>
        </nav>
        <div style="padding-top: 15px; margin-left: 5px;"> <Strong>UNDER 17 LIBERTAS</Strong></div> <br>
        <br>
        <div > <img id="gep1" src="u17libertas.png" alt="Foto Squadra"></div>
        <br>
        <div id="immagine_u17" style="text-align: center"> <strong>U17 LIBERTAS</strong><br>Ecco la rosa ufficiale della stagione 2024/25</div>
        <table>
        <tr>
            <th data-type="text">Nome</th>
            <th data-type="text">Cognome</th>
            <th data-type="number">Anno di Nascita</th>
            <th data-type="text">Ruolo</th>
            <th data-type="number">Numero di Maglia</th>
        </tr>
        <tr>
            <td>Umberto</td>
            <td>Aceto</td>
            <td>2009</td>
            <td>Playmaker</td>
            <td>21</td>
        </tr>
        <tr>
            <td>Antonio</td>
            <td>Carfora</td>
            <td>2008</td>
            <td>Ala piccola</td>
            <td>18</td>
        </tr>
        <tr>
            <td>Ferdinando</td>
            <td>Gambardella</td>
            <td>2008</td>
            <td>Ala piccola</td>
            <td>22</td>
        </tr>
        <tr>
            <td>Luca</td>
            <td>Zuppardo</td>
            <td>2008</td>
            <td>Centro</td>
            <td>69</td>
        </tr>
        <tr>
            <td>Matteo</td>
            <td>Manzi</td>
            <td>2008</td>
            <td>Ala piccola</td>
            <td>4</td>
        </tr>
        <tr>
            <td>Giuseppe</td>
            <td>De Maio</td>
            <td>2008</td>
            <td>Centro</td>
            <td>13</td>
        </tr>
        <tr>
            <td>Gianni</td>
            <td>Di Capua</td>
            <td>2009</td>
            <td>Guardia</td>
            <td>20</td>
        </tr>
        <tr>
            <td>Vittorio</td>
            <td>Esposito</td>
            <td>2010</td>
            <td>Ala piccola</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Andrea</td>
            <td>Ferrazzano</td>
            <td>2008</td>
            <td>Ala grande</td>
            <td>6</td>
        </tr>
        <tr>
            <td>Cristian</td>
            <td>Floro</td>
            <td>2009</td>
            <td>Centro</td>
            <td>9</td>
        </tr>
        <tr>
            <td>Thomas</td>
            <td>Galibardi</td>
            <td>2008</td>
            <td>Ala piccola</td>
            <td>17</td>
        </tr>
        <tr>
            <td>Antonio</td>
            <td>Gambardella</td>
            <td>2009</td>
            <td>Playmaker</td>
            <td>12</td>
        </tr>
        <tr>
            <td>Mattia</td>
            <td>Proto</td>
            <td>2009</td>
            <td>Playmaker</td>
            <td>47</td>
        </tr>
        <tr>
            <td>Thomas</td>
            <td>Proto</td>
            <td>2009</td>
            <td>Guardia</td>
            <td>72</td>
        </tr>
        <tr>
            <td>Ferdinando</td>
            <td>Gambardella</td>
            <td>2010</td>
            <td>Centro</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Gabriele</td>
            <td>Rabesco</td>
            <td>2010</td>
            <td>Ala piccola</td>
            <td>24</td>
        </tr>
        <tr>
            <td>Diego</td>
            <td>Sorrentino</td>
            <td>2009</td>
            <td>Ala grande</td>
            <td>55</td>
        </tr>
        <tr>
            <td>Simone</td>
            <td>Trezza</td>
            <td>2011</td>
            <td>Centro</td>
            <td>7</td>
        </tr>
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
            <script src="table.js"></script>
           <?php include 'footer.html'; ?>
    </body>
</html>
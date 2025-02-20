<?php include 'header.php'; ?>
<html>
    <head>
        <title>Minibasket</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="teams.css" type="text/css"/>
    </head>
    <body>
    <nav class="main-nav">
            <a href="teams.php" class="nav-link">PRIMA SQUADRA MASCHILE</a>
            <a href="u19silver.php" class="nav-link"> U19 SILVER</a> 
            <a href="u17libertas.php" class="nav-link"> U17 LIBERTAS</a> 
            <a href="u13libertas.php" class="nav-link"> U13 LIBERTAS</a> 
            <a href="minibasket.php" class="nav-link"> MINIBASKET</a>
        </nav>
        <div class="roster"> <Strong><h3>MINIBASKET</h3></Strong></div> <br>
        <br>
        <div> <img src="photo_teams/minibasket.png" alt="Foto Squadra" class="team-image"></div>
        <br>
        <div class="roster-title"> <strong>MINIBASKET</strong><br>Ecco la rosa ufficiale della stagione 2024/25</div>
        <table>
        <tr>
            <th data-type="text">Nome</th>
            <th data-type="text">Cognome</th>
            <th data-type="number">Anno di Nascita</th>
            <th data-type="text">Ruolo</th>
            <th data-type="number">Numero di Maglia</th>
        </tr>
        <tr><td>Marco</td><td>Rossi</td><td>2015</td><td>Playmaker</td><td>33</td></tr>
        <tr><td>Giulia</td><td>Bianchi</td><td>2016</td><td>Guardia</td><td>88</td></tr>
        <tr><td>Andrea</td><td>Verdi</td><td>2014</td><td>Centro</td><td>45</td></tr>
        <tr><td>Sara</td><td>Moretti</td><td>2017</td><td>Ala piccola</td><td>9</td></tr>
        <tr><td>Matteo</td><td>Ferrari</td><td>2018</td><td>Ala grande</td><td>55</td></tr>
        <tr><td>Elena</td><td>Russo</td><td>2015</td><td>Guardia</td><td>26</td></tr>
        <tr><td>Davide</td><td>Colombo</td><td>2016</td><td>Centro</td><td>13</td></tr>
        <tr><td>Francesca</td><td>Conti</td><td>2017</td><td>Playmaker</td><td>77</td></tr>
        <tr><td>Luca</td><td>De Luca</td><td>2018</td><td>Ala piccola</td><td>10</td></tr>
        <tr><td>Alessandro</td><td>Mancini</td><td>2014</td><td>Ala grande</td><td>18</td></tr>
        <tr><td>Martina</td><td>Rinaldi</td><td>2015</td><td>Playmaker</td><td>0</td></tr>
        <tr><td>Riccardo</td><td>Galli</td><td>2016</td><td>Guardia</td><td>7</td></tr>
        <tr><td>Valentina</td><td>Serra</td><td>2017</td><td>Centro</td><td>42</td></tr>
        <tr><td>Tommaso</td><td>Leone</td><td>2018</td><td>Ala piccola</td><td>14</td></tr>
        <tr><td>Alice</td><td>Pellegrini</td><td>2014</td><td>Ala grande</td><td>44</td></tr>
        <tr><td>Filippo</td><td>Marini</td><td>2015</td><td>Playmaker</td><td>22</td></tr>
        <tr><td>Chiara</td><td>Benedetti</td><td>2016</td><td>Guardia</td><td>19</td></tr>
        <tr><td>Leonardo</td><td>Gatti</td><td>2017</td><td>Centro</td><td>17</td></tr>
        <tr><td>Emma</td><td>Villa</td><td>2018</td><td>Ala piccola</td><td>29</td></tr>
        <tr><td>Gabriele</td><td>Fabbri</td><td>2014</td><td>Ala grande</td><td>11</td></tr>
    </table>
   
    <div class="position-title"><h2 class="roster">ALLENATORE</h2>
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
        <?php include 'footer.html'; ?>
        <script src="table.js"></script>
    </body>
</html>

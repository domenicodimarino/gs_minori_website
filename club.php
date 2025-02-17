<?php
  // Puoi eventualmente aggiungere qui eventuali variabili PHP se necessarie
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>GS Minori - Sito ufficiale</title>
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="club.css" type="text/css">
</head>
<body>
    <!-- Header -->
  <?php include 'header.php'; ?>
  
  <div class="container">
    <!-- Sezione "Chi siamo?" -->
    <section id="chi-siamo" class="section-chisiamo">
      <h1>Chi siamo?</h1>
      <p>
        Il Gruppo Sportivo Minori Pallacanestro (GS Minori) è una storica società sportiva della Costiera Amalfitana, attiva da oltre quarant'anni nel panorama cestistico campano. Fondata con l'obiettivo di promuovere la pallacanestro e i valori sportivi nella comunità locale, la società ha sempre posto l'accento sulla formazione dei giovani e sull'inclusione sociale.
      </p>
      <img src="photo_club/chi_siamo.jpg" alt="Chi siamo" class="chi">
    </section>

    <!-- Sezione "Mino" -->
    <section id="mino" class="section-mino">
      <h2>Mino</h2>
      <p class="description">
        Oltre all'attività agonistica, il GS Minori ha curato l'aspetto identitario e culturale del club. Nel 2019 è stata introdotta la mascotte ufficiale, "Mino", un toro marino ispirato a un mosaico della Villa Romana Marittima di Minori, simbolo del legame tra la società e il patrimonio storico locale.
        <img src="photo_club/mino_copy.png" alt="Mino" class="mino">
    </p>
    </section>

    <!-- Sezione "Staff" -->
    <section id="staff" class="section-staff">
      <h1>Staff</h1>
      <p>
        Il GS Minori può contare su uno staff dirigenziale e tecnico di grande competenza e passione, impegnato nella crescita del movimento cestistico locale.<br>
        Alla guida della società c'è il Presidente Vito D'Alfonso, affiancato dal Vicepresidente Ivo Di Lieto e dalla Dirigente Mariangela Di Lieto, figure chiave nella gestione organizzativa e nello sviluppo delle attività sportive.<br>
        Il settore tecnico vanta un team di allenatori qualificati, tra cui Mimmo Apicella, Andrea Dipino, Federico Apicella, Marianna D'Amato, Jacopo Porpora, Giancarlo Di Bianco e Gabriele Di Lieto, professionisti dediti alla formazione dei giovani atleti e alla guida delle squadre nelle competizioni regionali.<br>
        Grazie al loro impegno, il GS Minori continua a crescere, puntando su valori come dedizione, spirito di squadra e sviluppo del talento.
      </p>
    </section>

   <!-- Sezione "Storia" riorganizzata -->
<section id="storia" class="section-storia">
  <?php
    // Dati per la pagina
    $title = "Storia Sentimentale del GS Minori";
    $intro = "Questo racconto nasce dal ricordo di un ragazzino, risalente al 1973, quando fu invitato a scoprire il magico mondo della pallacanestro in un piccolo paese. Una storia che parla di passione, amicizia e di una tradizione che dura da oltre cinque decenni.";

    // Array di eventi per la timeline
    $timelineEvents = array(
      array(
        "date" => "21 Novembre 1970",
        "title" => "L'inizio di un'Avventura che dura ancora oggi",
        "content" => "Il 21 novembre 1970, alle ore 19:00, tre giovani uomini - Alfonso Florio, Gabriele Di Lieto e Alfonso Pepe - diedero inizio a questa avventura, invitando altre persone a partecipare alla costituzione iniziale della Polisportiva GS Minori, con una sezione Calcio e l'apertura a tutti gli sport praticabili nel paese."
      ),
      array(
        "date" => "12 Dicembre 1970",
        "title" => "Elezione del Primo Direttivo",
        "content" => "Il 12 dicembre alle ore 22:00, sempre del 1970, fu eletto il primo direttivo che successivamente elesse le cariche societarie. Gabriele Di Lieto fu eletto presidente, Alfonso Pepe vice presidente, Gaspare Apicella segretario e Antonio Mansi cassiere. Gabriele Di Lieto sarà l’unico ad essere sempre presente nell’associazione fino alla sua scomparsa, ricoprendo per numerosi anni la carica di presidente."
      ),
      array(
        "date" => "30 Dicembre 1976",
        "title" => "Costituzione Ufficiale",
        "content" => "Nel 1976, il 30 dicembre (un giovedì), ci fu la costituzione ufficiale davanti al notaio Sessa con 15 soci fondatori, fra cui l’unica donna, Teresa Apicella. Insieme a lei, firmarono: Alfonso Pepe, Gabriele Di Lieto, Gaetano Proto, Antonio Mansi, Giovanni Ruocco, Raffaele Anastasio, Gennaro Apicella, Gennaro Schiavo, Marcello Proto, Antonio Costa, Carlo Mansi, Miche Sammarco, Domenico Ruocco e Alfonso Bonito. Nella stessa data, fu eletto Presidente della Polisportiva Alfonso Pepe, mentre alla sezione pallacanestro e giochi della gioventù fu nominato Giovanni Ruocco e alla sezione calcio Gaetano Ruocco."
      ),
      array(
        "date" => "Anni '70-75",
        "title" => "Il primo presidente e il campo scoperto",
        "content" => "Il mio primo presidente è stato Alfonso Pepe. Ricordo benissimo quando ultimarono il campo di Pallacanestro con manto in asfalto, rigorosamente scoperto e all’inizio senza impianto di illuminazione, nello stesso posto dove adesso c’è l’attuale Tendostruttura realizzata nel 1985."
      ),
      array(
         "title" => "Gli albori della pallacanestro a Minori",
         "content" => "All’inizio allenava il Professore Gabriele Di Lieto, sportivo a 360 gradi, che oltre ad essere mister si cimentava anche nella conduzione delle prime squadre di pallacanestro che si costituivano. Io ricordo quella formata dalla classe 1955-1956 in avanti, dove giocavano Mimmo Cornero, Beppe Sammarco, Minicuccio D’Amato e tanti altri, impegnati in sfide infuocate con la vicina Maiori e Amalfi."
      ),
      array(
        "title" => "Il primo vero coach: Vincenzo Proto e la squadra femminile",
        "content" => "Il primo vero coach è stato Vincenzo Proto, che iniziò a formare la prima squadra femminile, la quale poi raggiunse la Serie C. Insieme a lui, con altri incarichi, ricordo Mario Fraulo (dapprima segretario e poi, per necessità, coach) e anche Minicuccio D’Amato. Poi la Patria, con il servizio di leva obbligatorio, impose un ricambio e subentrarono al loro posto Pio Zizzi e Salvatore Aceto."
      ),
      array(
        "title" => "Cambio di presidenti e successi giovanili",
        "content" => "Nel frattempo cambiarono anche i presidenti. Alfonso Pepe, dopo aver raccolto grandissime soddisfazioni anche con il nostro gruppo 1963-1964 (rimasto imbattuto nel campionato ragazzi, fino ad arrivare alla fase precedente alle finali nazionali, perdendo solo in finale a Monopoli), lasciò la carica di presidente a Giovanni Ruocco, che fu poi fondamentale per la realizzazione della copertura del campo."
      ),
      array(
        "title" => "La squadra femminile in Serie C e la Promozione maschile",
        "content" => "La squadra femminile militava stabilmente in Serie C, mentre svolgevamo il campionato di Promozione maschile con buoni risultati. L’anno dopo, il nostro gruppo, formato da Enzo Di Palma (forse il talento più grande che abbiamo avuto nel settore maschile), Roberto Cafasso, Mimmo Tozzi e tanti altri ragazzi (tutti importantissimi, ma non citati qui per motivi di spazio), arrivammo alla finale contro Italsider Napoli, società che militava in B (paragonabile all’attuale A2 di oggi), per l’accesso alle finali nazionali di Montecatini. Se avessimo vinto, avremmo giocato con Bologna, Milano: un sogno che però si infranse con una sconfitta di sole cinque punti di scarto, con un arbitraggio scandaloso."
      ),
      array(
        "date" => "Anni '80",
        "title" => "Evoluzione e Boom",
        "content" => "Avviandoci verso gli anni 1980, anni di boom per la pallacanestro, ricordo che noi svolgevamo tutti i campionati maschili e femminili con ottimi risultati. Pio Zizzi era il vero motore dell’associazione, attorno a lui iniziavano a crescere nuovi coach e istruttori. Rosa Ruocco fu ceduta a Gragnano nella A1 femminile e, in seguito, continuando l’ottima tradizione femminile, anche Liliana Miccio ha costruito un’ottima carriera in Serie A ed è attualmente top player di Firenze in A2."
      ),
      array(
        "title" => "I nuovi presidenti e l’eredità del G.S. Minori",
        "content" => "Dopo Giovanni Ruocco, fu eletto presidente Gennaro Apicella, padre di Carmela (che militava nella squadra di Serie C), il quale è stato la persona che mi ha indotto a deporre la casacca di giocatore per intraprendere la carriera di coach, che continuo a svolgere ancora oggi con grande passione e divertimento. Siamo nel lontano 1980, e la passione per la pallacanestro a Minori non ha mai smesso di ardere."     
         )
    );
  ?>

  <h1><?php echo $title; ?></h1>
  <p><?php echo $intro; ?></p>

  <div class="timeline">
    <?php foreach ($timelineEvents as $event): ?>
      <div class="timeline-event">
        <!-- Questo if è fatto perché ci sono casi in cui non ci sono le date -->
        <?php if (isset($event['date'])): ?>
          <div class="timeline-date"><?php echo $event['date']; ?></div>
        <?php endif; ?>
        <div class="timeline-content">
          <h2><?php echo $event['title']; ?></h2>
          <p><?php echo $event['content']; ?></p>
        </div>
        </div>
    <?php endforeach; ?>
      </div>
  </div>
</section>

 <!-- Footer -->
<?php include 'footer.html'; ?>
</body>
</html>

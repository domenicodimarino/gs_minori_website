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
    <section id="chi-siamo" class="section-chisiamo" style="margin-bottom:10px;">
      <h1>Chi siamo?</h1>
      <img src="photo_club/chi_siamo.jpg" alt="Chi siamo" class="chi" >
      <p>
        Il Gruppo Sportivo Minori Pallacanestro (GS Minori) è una storica società sportiva della Costiera Amalfitana, attiva da oltre quarant'anni nel panorama cestistico campano. Fondata con l'obiettivo di promuovere la pallacanestro e i valori sportivi nella comunità locale, la società ha sempre posto l'accento sulla formazione dei giovani e sull'inclusione sociale.
      </p>
    </section>

    <!-- Sezione "Mino" -->
    <section id="mino" class="section-mino">
  <h2>Mino</h2>
  <p class="description">
    <img src="photo_club/mino_copy.png" alt="Mino" class="mino">
    Oltre all'attività agonistica, il GS Minori ha posto grande attenzione all'aspetto identitario e culturale del club, riconoscendo l'importanza di valorizzare le proprie radici e la ricca tradizione della Costiera Amalfitana. Il club non si limita solo alla competizione sportiva, ma promuove attivamente iniziative volte a diffondere la cultura locale, a celebrare la storia e a coinvolgere la comunità in eventi e progetti che rafforzano il senso di appartenenza. Nel 2019, a testimonianza di questo impegno, è stata introdotta la mascotte ufficiale, "Mino". Questa figura, rappresentata da un toro marino, trae ispirazione da un prezioso mosaico della Villa Romana Marittima di Minori, simbolo autentico del legame profondo tra la società e il patrimonio storico del territorio. Con l'introduzione di Mino, il GS Minori intende non solo rafforzare l'identità del club, ma anche creare un punto di riferimento emotivo per tifosi e sostenitori, trasmettendo valori di orgoglio, tradizione e innovazione che caratterizzano l'evoluzione del club nel tempo.    <!-- resto del testo -->
  </p>
</section>


    <!-- Sezione "Staff" -->
    <section id="staff" class="section-staff">
  <h1>Staff</h1>
  <p>
    Lo staff del GS Minori è il <strong>cuore pulsante della società</strong>, una squadra di <strong>professionisti e appassionati</strong> che lavora con dedizione per garantire la crescita e il successo del club su tutti i fronti.<br><br>
    
    Al vertice, il <strong>Presidente Vito D'Alfonso</strong> guida con una visione chiara e strategica, ponendo le basi per un'organizzazione solida e orientata al futuro; al suo fianco, i <strong>VicePresidenti Di Lieto Ivo</strong> e <strong>Proto Alfonso</strong> offrono supporto costante e competenze specifiche, contribuendo alla definizione delle politiche e degli obiettivi del club.<br><br>
    
    La gestione amministrativa e la comunicazione interna ed esterna sono affidate a <strong>Di Lieto Mariangela</strong>, la Segretaria, che assicura che ogni operazione si svolga in modo efficiente e puntuale.<br><br>
    
    Sul fronte della formazione giovanile, il <strong>Responsabile del Settore Giovanile, Apicella Mimmo</strong> è un punto di riferimento per la crescita delle nuove leve, seguendole con attenzione e dedizione.<br><br>
    
    In ambito tecnico, la guida della <strong>Prima Squadra</strong> e delle categorie <strong>U19 e U17</strong> è affidata a <strong>Porpora Jacopo</strong>, un allenatore che si distingue per la capacità di trasmettere passione e disciplina, fondamentale per preparare gli atleti alle sfide competitive.<br><br>
    
    Per gli <strong>Under 13</strong>, il ruolo di allenatore spetta a <strong>Mimmo Apicella</strong>, che, grazie alla sua esperienza, ha saputo creare un ambiente formativo positivo e stimolante, affiancato dall'assistenza di <strong>Di Lieto Gabriele</strong>, il cui contributo è essenziale per affinare le competenze tecniche e tattiche dei giovani.<br><br>
    
    A completare il quadro, la <strong>Preparatrice Atletica D'Amato Marianna</strong> lavora instancabilmente per garantire che ogni atleta mantenga livelli ottimali di condizione fisica, elementi imprescindibili per affrontare le sfide in campo.<br><br>
    
    Infine, il settore <strong>MiniBasket</strong>, fondamentale per avvicinare i più piccoli al mondo della pallacanestro, è coordinato da <strong>Dipino Andrea</strong> e <strong>Apicella Federico</strong>, supportati dall'<strong>Assistente MiniBasket Di Bianco Giancarlo</strong>, che insieme instaurano un clima di entusiasmo e di apprendimento, preparando le future generazioni con passione e professionalità.<br><br>
    
    In sintesi, lo staff del GS Minori è una squadra coesa e versatile, capace di coniugare <strong>esperienza, innovazione e amore per il gioco</strong>, elementi che rendono il club un punto di riferimento nella pallacanestro della Costiera Amalfitana.
  </p>
</section>


   <!-- Sezione "Storia"  -->
<section id="storia" class="section-storia">
  <?php
    // Dati per la pagina
    $title = "Storia Sentimentale del GS Minori";
    $intro = "Questo racconto nasce dal ricordo di un ragazzino, risalente al 1973, quando fu invitato a scoprire il magico mondo della pallacanestro in un piccolo paese. Una storia che parla di passione, amicizia e di una tradizione che dura da oltre cinque decenni.";

    // Array di eventi per la timeline
    $timelineEvents = array(
      array(
        "image" => "photo_club/storia4.jpg",
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
        "content" => "Il mio primo presidente è stato Alfonso Pepe. Ricordo benissimo quando ultimarono il campo di Pallacanestro con manto in asfalto, rigorosamente scoperto e all’inizio senza impianto di illuminazione, nello stesso posto dove adesso c’è l’attuale Tendostruttura realizzata nel 1985.",
        "image" => "photo_club/storia3.jpg"
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
        "content" => "La squadra femminile militava stabilmente in Serie C, mentre svolgevamo il campionato di Promozione maschile con buoni risultati. L’anno dopo, il nostro gruppo, formato da Enzo Di Palma (forse il talento più grande che abbiamo avuto nel settore maschile), Roberto Cafasso, Mimmo Tozzi e tanti altri ragazzi (tutti importantissimi, ma non citati qui per motivi di spazio), arrivammo alla finale contro Italsider Napoli, società che militava in B (paragonabile all’attuale A2 di oggi), per l’accesso alle finali nazionali di Montecatini. Se avessimo vinto, avremmo giocato con Bologna, Milano: un sogno che però si infranse con una sconfitta di sole cinque punti di scarto, con un arbitraggio scandaloso.",
        "image" => "photo_club/storia2.jpg"
      ),
      array(
        "date" => "Anni '80",
        "title" => "Evoluzione e Boom",
        "content" => "Avviandoci verso gli anni 1980, anni di boom per la pallacanestro, ricordo che noi svolgevamo tutti i campionati maschili e femminili con ottimi risultati. Pio Zizzi era il vero motore dell’associazione, attorno a lui iniziavano a crescere nuovi coach e istruttori. Rosa Ruocco fu ceduta a Gragnano nella A1 femminile e, in seguito, continuando l’ottima tradizione femminile, anche Liliana Miccio ha costruito un’ottima carriera in Serie A ed è attualmente top player di Firenze in A2."
      ),
      array(
        "title" => "I nuovi presidenti e l’eredità del G.S. Minori",
        "content" => "Dopo Giovanni Ruocco, fu eletto presidente Gennaro Apicella, padre di Carmela (che militava nella squadra di Serie C), il quale è stato la persona che mi ha indotto a deporre la casacca di giocatore per intraprendere la carriera di coach, che continuo a svolgere ancora oggi con grande passione e divertimento. Siamo nel lontano 1980, e la passione per la pallacanestro a Minori non ha mai smesso di ardere.",   
         "image" => "photo_club/storia1.jpg"
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

           <!-- Se l'evento ha un campo 'image', stampiamo l'immagine -->
           <?php if (isset($event['image'])): ?>
            <img src="<?php echo $event['image']; ?>" alt="Immagine evento">
          <?php endif; ?>
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

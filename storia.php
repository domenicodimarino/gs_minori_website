<?php
// Dati per la pagina
$title = "Storia Sentimentale del GS Minori";
$intro = "Questo racconto nasce dal ricordo di un ragazzino, risalente al 1973, quando fu invitato a scoprire il magico mondo della pallacanestro in un piccolo paese. Una storia che parla di passione, amicizia e di una tradizione che dura da oltre cinque decenni.";

// Array di eventi per la timeline
$timelineEvents = array(
    array(
        "date" => "21 Novembre 1970",
        "title" => "Gli Inizi",
        "content" => "Il 21 novembre 1970, alle ore 19:00, tre giovani uomini - Alfonso Florio, Gabriele Di Lieto e Alfonso Pepe - diedero inizio a questa avventura, invitando altre persone a partecipare alla costituzione iniziale della Polisportiva GS Minori, con una sezione Calcio e l'apertura a tutti gli sport praticabili nel paese. Il 12 dicembre alle ore 22:00 fu eletto il primo direttivo."
    ),
    array(
        "date" => "30 Dicembre 1976",
        "title" => "Costituzione Ufficiale",
        "content" => "Il 30 dicembre 1976, di giovedì, avvenne la costituzione ufficiale davanti al notaio Sessa con 15 soci fondatori, tra cui l'unica donna, Teresa Apicella. In quella data vennero anche elette le prime cariche: Alfonso Pepe come Presidente della Polisportiva, Giovanni Ruocco per la sezione pallacanestro e giochi della gioventù, e Gaetano Ruocco per la sezione calcio."
    ),
    array(
        "date" => "Anni '70",
        "title" => "I Primi Anni e le Tradizioni",
        "content" => "Il primo campo di pallacanestro venne ultimato in asfalto, senza impianto di illuminazione, nello stesso luogo dove oggi sorge la Tendostruttura realizzata nel 1985. Il Professore Gabriele Di Lieto, oltre a fare da mister, guidava le prime squadre con giocatori come Mimmo Cornero, Beppe Sammarco, Minicuccio D'Amato e altri, affrontando sfide infuocate contro le squadre di Maiori e Amalfi."
    ),
    array(
        "date" => "Anni '80",
        "title" => "Evoluzione e Boom",
        "content" => "Durante gli anni '80, il GS Minori consolidò la propria presenza nel campionato, con importanti successi nelle sezioni maschili e femminili. Con il passaggio di testimone tra i dirigenti e l'arrivo di nuovi coach, emersero talenti e squadre di grande valore. Eventi memorabili, come il gruppo 1963-1964 e le finali contro società di rilievo, segnarono un'epoca d'oro per il club."
    )
);
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title><?php echo $title; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
    }
    .timeline {
      border-left: 3px solid #333;
      margin-top: 20px;
      padding-left: 20px;
    }
    .timeline-item {
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 1px dashed #ccc;
    }
    .timeline-date {
      font-weight: bold;
      color: #555;
    }
    h2 {
      color: #333;
      border-bottom: 2px solid #333;
      padding-bottom: 5px;
    }
    footer {
      text-align: center;
      padding: 10px;
      margin-top: 20px;
      background-color: #333;
      color: #fff;
    }
  </style>
</head>
<body>
  <header>
    <h1><?php echo $title; ?></h1>
  </header>
  <div class="container">
    <p><?php echo $intro; ?></p>
    <section class="timeline">
      <?php foreach($timelineEvents as $event): ?>
        <div class="timeline-item">
          <p class="timeline-date"><?php echo $event["date"]; ?></p>
          <h2><?php echo $event["title"]; ?></h2>
          <p><?php echo $event["content"]; ?></p>
        </div>
      <?php endforeach; ?>
    </section>
  </div>
  <footer>
    <p>&copy; <?php echo date("Y"); ?> GS Minori - Costiera Amalfitana</p>
  </footer>
</body>
</html>

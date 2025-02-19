<?php require_once 'header.php'; ?>
<?php 
$players = [
    [
        'name' => 'Alessandro Mammato',
        'age' => 21,
        'ruolo' => 'Playmaker',
        'number' => 34,
        'image' => 'photo_teams/alemammato.png',
        'stats_link' => 'https://www.playbasket.it/campania/profile.php?exteid=4&extobj=4305&subj=1&season=2025&obj=150012&action=view&eid=5'
    ],
    [
        'name' => 'Cristian Cantilena',
        'age' => 26,
        'ruolo' => 'Guardia',
        'number' => 17,
        'image' => 'photo_teams/cristian.jpg',
        'stats_link' => 'https://www.playbasket.it/campania/profile.php?exteid=4&extobj=4305&subj=1&season=2025&obj=59086&action=view&eid=5'
    ],
    [
        'name' => 'Gennaro Infante',
        'age' => 37,
        'ruolo' => 'Guardia',
        'number' => 13,
        'image' => 'photo_teams/gennaro.jpg',
        'stats_link' => 'https://www.playbasket.it/campania/profile.php?exteid=4&extobj=4305&subj=1&season=2025&obj=33743&action=view&eid=5'
    ],
    [
        'name' => 'Alfonso Fusco',
        'age' => 24,
        'ruolo' => 'Ala piccola',
        'number' => 15,
        'image' => 'photo_teams/alfonso_fusco.jpg',
        'stats_link' => 'https://www.playbasket.it/campania/profile.php?exteid=4&extobj=4305&subj=1&season=2025&obj=107264&action=view&eid=5'
    ],
    [
        'name' => 'Danilo Galibardi',
        'age' => 25,
        'ruolo' => 'Ala piccola',
        'number' => 30,
        'image' => 'photo_teams/danilo.jpg',
        'stats_link' => 'https://www.playbasket.it/campania/profile.php?exteid=4&extobj=4305&subj=1&season=2025&obj=103073&action=view&eid=5'
    ],
    [
        'name' => 'Gabriele Di Lieto',
        'age' => 21,
        'ruolo' => 'Ala piccola',
        'number' => 10,
        'image' => 'photo_teams/gabriele.jpg',
        'stats_link' => 'https://www.playbasket.it/campania/profile.php?exteid=4&extobj=4305&subj=1&season=2025&obj=139096&action=view&eid=5'
    ],
    [
        'name' => 'Manuel Proto',
        'age' => 25,
        'ruolo' => 'Ala piccola',
        'number' => 77,
        'image' => 'photo_teams/manuel.jpg',
        'stats_link' => 'https://www.playbasket.it/campania/profile.php?exteid=4&extobj=4305&subj=1&season=2025&obj=82795&action=view&eid=5'
    ],
    [
        'name' => 'Giacinto Spinaccio',
        'age' => 52,
        'ruolo' => 'Ala grande',   
        'number' => 11,
        'image' => 'photo_teams/giacinto.jpg',
        'stats_link' => 'https://www.playbasket.it/campania/profile.php?exteid=4&extobj=4305&subj=1&season=2025&obj=33741&action=view&eid=5'
    ],
    [
        'name' => 'Vlad Laptyev',
        'age' => 32,
        'ruolo' => 'Ala grande',
        'number' => 23,
        'image' => 'photo_teams/vlad.jpg',
        'stats_link' => 'https://www.playbasket.it/campania/profile.php?exteid=4&extobj=4305&subj=1&season=2025&obj=35369&action=view&eid=5'
    ],
    [
        'name' => 'Alessio Proto',
        'age' => 21,
        'ruolo' => 'Centro',
        'number' => 7,
        'image' => 'photo_teams/alessio.jpg',
        'stats_link' => 'https://www.playbasket.it/campania/profile.php?exteid=4&extobj=4305&subj=1&season=2025&obj=133933&action=view&eid=5'
    ]
];

$playerId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$player = $players[$playerId];

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GS Minori - Player Information</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="player.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <main>
                <section class = "player_image">
                <img src="<?php echo htmlspecialchars($player['image']); ?>" alt="<?php echo htmlspecialchars($player['name']); ?>" class="player-image">
                <div class = "player_brief_stats"> 
                    <h2>Statistiche</h2>
                    <section class = "actual_stats">
                    <span id="total-points"></span>
                    <span id="average-points"></span>
                    <span id="games-played"></span>
                    <span id="best-score"></span>
                    </section>
                </div>
                </section>
                <section class = "player_info">
                    <div class ="info">
                <h1><?php echo htmlspecialchars($player['name']); ?></h1>
                <p><strong>Età:</strong> <?php echo htmlspecialchars($player['age']); ?></p>
                <p><strong>Ruolo:</strong><?php echo htmlspecialchars($player['ruolo']); ?></p>
                <p><strong>Numero di maglia:</strong> <?php echo htmlspecialchars($player['number']); ?></p>
                </div>
                <h2>Partite disputate da <?php echo htmlspecialchars($player['name']);?></h2>
                <p style="text-align: center; margin-top: 5px;"><a href="<?php echo htmlspecialchars($player['stats_link']); ?>" target="_blank">Visualizza statistiche su Playbasket</a></p>
                <!-- Passiamo l'URL delle statistiche a JavaScript -->
                <div id="player-data" data-stats-link="<?php echo htmlspecialchars($player['stats_link']); ?>"></div>
                <div id="table-container">Caricamento statistiche in corso...</div>
                </section>
            </main>
            <script src="player_stats.js"></script>
        </div>
        <?php require_once 'footer.html'?>
    </div>
</body>
</html>
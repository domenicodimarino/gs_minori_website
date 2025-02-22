<?php
header('Content-Type: application/json');

// Dati delle prossime partite
$prossime_partite = [
    [
        "data" => "23 Febbraio 2025",
        "squadre" => "G.S. MINORI PALLACANESTRO vs ATHLETIC SYSTEM S.GIORGIO",
        "luogo" => "TENDOSTRUTTURA COMUNALE - Via Dietro La Chiesa MINORI (SA)"
    ],
    [
        "data" => "5 Marzo 2025",
        "squadre" => "FARMACIA GRECO PORTICI 2000 vs G.S. MINORI PALLACANESTRO",
        "luogo" => "Palazzetto - Viale Dei Cedri, 66 CASALNUOVO DI NAPOLI (NA)"
    ],
    [
        "data" => "9 Marzo 2025",
        "squadre" => "G.S. MINORI PALLACANESTRO vs SAMMARITANA BASKET E SPORT",
        "luogo" => "TENDOSTRUTTURA COMUNALE - Via Dietro La Chiesa MINORI (SA)"
    ],
    [
        "data" => "12 Marzo 2025",
        "squadre" => "DIESEL TECNICA SALA CONSILINA vs G.S. MINORI PALLACANESTRO",
        "luogo" => "Palazzetto - Via Pozzillo SALA CONSILINA (SA)"
    ],
    [
        "data" => "16 Marzo 2025",
        "squadre" => "G.S. MINORI PALLACANESTRO vs CUS NAPOLI",
        "luogo" => "G.S. MINORI PALLACANESTRO CUS NAPOLI"
    ],
    [
        "data" => "23 Marzo 2025",
        "squadre" => "L&G TRASPORTI SRL SIANO vs G.S. MINORI PALLACANESTRO",
        "luogo" => "Palestra Ist. Professionale - Via Vaticale SIANO (SA)"
    ],
    [
        "data" => "30 Marzo 2025",
        "squadre" => "G.S. MINORI PALLACANESTRO vs CENTRO BASKET T. ANNUNZIATA",
        "luogo" => "TENDOSTRUTTURA COMUNALE - Via Dietro La Chiesa MINORI (SA)"
    ],
    [
        "data" => "6 Aprile 2025",
        "squadre" => "GRANIANUM BASKET ACADEMY vs G.S. MINORI PALLACANESTRO",
        "luogo" => "STRUTTURA GEODETICA - Via V. Veneto 267 GRAGNANO (NA)"
    ],
    [
        "data" => "13 Aprile 2025",
        "squadre" => "G.S. MINORI PALLACANESTRO vs BASKET BELLIZZI",
        "luogo" => "TENDOSTRUTTURA COMUNALE - Via Dietro La Chiesa MINORI (SA)"
    ],
    [
        "data" => "27 Aprile 2025",
        "squadre" => "POL. SPORTING C. ERCOLANO vs G.S. MINORI PALLACANESTRO",
        "luogo" => "Palestra 'A.Tilgher' - Contrada Casacampora 3 ERCOLANO (NA)"
    ],
    [
        "data" => "30 Aprile 2025",
        "squadre" => "G.S. MINORI PALLACANESTRO vs BASKETORRE 2009",
        "luogo" => "TENDOSTRUTTURA COMUNALE - Via Dietro La Chiesa MINORI (SA)"
    ],
    [
        "data" => "4 Maggio 2025",
        "squadre" => "POL. VICO EQUENSE vs G.S. MINORI PALLACANESTRO",
        "luogo" => "Palazzetto - Via Madonnelle 5 VICO EQUENSE (NA)"
    ],
    [
        "data" => "11 Maggio 2025",
        "squadre" => "G.S. MINORI PALLACANESTRO vs POLISPORTIVA TORRETTA",
        "luogo" => "TENDOSTRUTTURA COMUNALE - Via Dietro La Chiesa MINORI (SA)"
    ],
    [
        "data" => "20 Maggio 2025",
        "squadre" => "POL. SORRENTO vs G.S. MINORI PALLACANESTRO ",
        "luogo" => "Tendostruttura - Sms Tasso Via Marziale SORRENTO (NA)"
    ]
];

echo json_encode($prossime_partite);
?>
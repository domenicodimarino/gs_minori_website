<?php
header('Content-Type: application/json');

// Dati della classifica (questi dati dovrebbero provenire dal database)
$classifica = [
    [
        "posizione" => 1, 
        "squadra" => "SAMMARITANA BASKET E SPORT", 
        "punti" => 34, 
        "partite_giocate" => 19, 
        "vittorie" => 17, 
        "sconfitte" => 2
    ],
    [
        "posizione" => 2, 
        "squadra" => "POL. SPORTING C. ERCOLANO", 
        "punti" => 28, 
        "partite_giocate" => 19, 
        "vittorie" => 14, 
        "sconfitte" => 5
    ],
    [
        "posizione" => 3,
        "squadra" => "THE CLUB SCAFATI",
        "punti" => 26,
        "partite_giocate" => 19,
        "vittorie" => 13,
        "sconfitte" => 6
    ],
    [
        "posizione" => 4,
        "squadra" => "G.S. MINORI PALLACANESTRO",
        "punti" => 26,
        "partite_giocate" => 18,
        "vittorie" => 13,
        "sconfitte" => 5
    ],
    [
        "posizione" => 5,
        "squadra" => "L&G TRASPORTI SRL SIANO",
        "punti" => 26,
        "partite_giocate" => 19,
        "vittorie" => 13,
        "sconfitte" => 6
    ],
    [
        "posizione" => 6,
        "squadra" => "GRANIANUM BASKET ACADEMY",
        "punti" => 24,
        "partite_giocate" => 19,
        "vittorie" => 12,
        "sconfitte" => 7
    ],
    [
        "posizione" => 7,
        "squadra" => "FARMACIA GRECO PORTICI 2000",
        "punti" => 22,
        "partite_giocate" => 17,
        "vittorie" => 11,
        "sconfitte" => 6
    ],
    [
        "posizione" => 8,
        "squadra" => "OLIMPIA CAPRI P.C.PECORARO",
        "punti" => 20,
        "partite_giocate" => 17,
        "vittorie" => 10,
        "sconfitte" => 7
    ],
    [
        "posizione" => 9,
        "squadra" => "C. VITOLO BASKET CAPACCIO PAES",
        "punti" => 20,
        "partite_giocate" => 18,
        "vittorie" => 10,
        "sconfitte" => 8
    ],
    [
        "posizione" => 10,
        "squadra" => "ATHLETIC SYSTEM S.GIORGIO",
        "punti" => 20,
        "partite_giocate" => 19,
        "vittorie" => 10,
        "sconfitte" => 9
    ],
    [
        "posizione" => 11,
        "squadra" => "POL. VICO EQUENSE",
        "punti" => 18,
        "partite_giocate" => 18,
        "vittorie" => 9,
        "sconfitte" => 9
    ],
    [
        "posizione" => 12,
        "squadra" => "DIESEL TECNICA SALA CONSILINA",
        "punti" => 14,
        "partite_giocate" => 19,
        "vittorie" => 7,
        "sconfitte" => 12
    ],
    [
        "posizione" => 13,
        "squadra" => "BASKETORRE 2009",
        "punti" => 14,
        "partite_giocate" => 18,
        "vittorie" => 7,
        "sconfitte" => 11
    ],
    [
        "posizione" => 14,
        "squadra" => "CUS NAPOLI",
        "punti" => 12,
        "partite_giocate" => 19,
        "vittorie" => 6,
        "sconfitte" => 13
    ],
    [
        "posizione" => 15,
        "squadra" => "BASKET BELLIZZI",
        "punti" => 10,
        "partite_giocate" => 19,
        "vittorie" => 5,
        "sconfitte" => 14
    ],
    [
        "posizione" => 16,
        "squadra" => "CENTRO BASKET T. ANNUNZIATA",
        "punti" => 8,
        "partite_giocate" => 19,
        "vittorie" => 4,
        "sconfitte" => 15
    ],
    [
        "posizione" => 17,
        "squadra" => "POL. SORRENTO",
        "punti" => 6,
        "partite_giocate" => 19,
        "vittorie" => 3,
        "sconfitte" => 16
    ],
    [
        "posizione" => 18,
        "squadra" => "POLISPORTIVA TORRETTA",
        "punti" => 6,
        "partite_giocate" => 19,
        "vittorie" => 3,
        "sconfitte" => 16
    ]   
];

echo json_encode($classifica);
?>
<?php
// db_new.php
$host = 'localhost';
$port = '5432';
$database = 'gruppo01';
$username = 'www';
$password = 'tw2024';

$dsn = "pgsql:host=$host;port=$port;dbname=$database;";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    die("Errore nella connessione: " . $e->getMessage());
}
?>

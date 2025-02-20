CREATE TABLE ticket_availability (
    id SERIAL PRIMARY KEY,
    match_id INTEGER NOT NULL,
    sector_id INTEGER NOT NULL,
    available_quantity INTEGER NOT NULL DEFAULT 0,
    CONSTRAINT unique_match_sector UNIQUE(match_id, sector_id)
);

/**
Spiegazione:
match_id: identifica la partita (corrispondente ad esempio ai match definiti in tickets.php).
sector_id: identifica il settore (da 1 a 12, come usati nei tuoi array PHP).
available_quantity: contiene la quantità di biglietti ancora disponibili per quel settore e quella partita.
La UNIQUE constraint su (match_id, sector_id) assicura che per ogni combinazione partita/settore esista una sola riga.
*/

INSERT INTO ticket_availability (match_id, sector_id, available_quantity)
VALUES 
(1, 1, 100), (1, 2, 80), /* … per ogni settore della partita 1 */
(2, 1, 90), (2, 2, 70), /* … per la partita 2 */
/* … e così via per le altre partite */
;

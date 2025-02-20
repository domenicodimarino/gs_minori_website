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
  -- Match 1
  (1, 1, 100), (1, 2, 100), (1, 3, 100), (1, 4, 100),
  (1, 5, 100), (1, 6, 100), (1, 7, 100), (1, 8, 100),
  (1, 9, 100), (1, 10, 100), (1, 11, 100), (1, 12, 100),

  -- Match 2
  (2, 1, 100), (2, 2, 100), (2, 3, 100), (2, 4, 100),
  (2, 5, 100), (2, 6, 100), (2, 7, 100), (2, 8, 100),
  (2, 9, 100), (2, 10, 100), (2, 11, 100), (2, 12, 100),

  -- Match 3
  (3, 1, 100), (3, 2, 100), (3, 3, 100), (3, 4, 100),
  (3, 5, 100), (3, 6, 100), (3, 7, 100), (3, 8, 100),
  (3, 9, 100), (3, 10, 100), (3, 11, 100), (3, 12, 100),

  -- Match 4
  (4, 1, 100), (4, 2, 100), (4, 3, 100), (4, 4, 100),
  (4, 5, 100), (4, 6, 100), (4, 7, 100), (4, 8, 100),
  (4, 9, 100), (4, 10, 100), (4, 11, 100), (4, 12, 100);


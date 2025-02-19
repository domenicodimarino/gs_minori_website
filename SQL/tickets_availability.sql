CREATE TABLE tickets_availability (
    id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    match_id INT NOT NULL,
    sector_id INT NOT NULL,
    available INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    UNIQUE(match_id, sector_id)
);

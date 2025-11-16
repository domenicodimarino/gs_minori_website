-- Table: public.immagini_newa

-- DROP TABLE IF EXISTS public.immagini_newa;

CREATE TABLE IF NOT EXISTS public.immagini_newa
(
    id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    immagine character varying(255) COLLATE pg_catalog."default",
    immagine_pc bytea,
    CONSTRAINT immagini_newa_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.immagini_newa
    OWNER to www;

COMMENT ON COLUMN public.immagini_newa.immagine_pc
    IS 'Immagine salvata sul database';

-- ULTIME MODIFICHE
-- Aggiunta di altre colonne per salvare le immaigni per categoria, in modo da implemntare la nuova pagina Photo glallery
ALTER TABLE public.immagini_newa
ADD COLUMN stagione_small smallint,              -- es: 2025 (per la stagione 2025/2026)
ADD COLUMN categoria varchar(50),                -- es: 'Pulcini', 'U19', 'DR2', 'Archivio', ecc.
ADD COLUMN archivio boolean DEFAULT false,       -- true = vecchie foto d’archivio
ADD COLUMN didascalia text,                      -- testo che appare aprendo l’immagine
ADD COLUMN data_foto date,                       -- opzionale: data della foto/evento
ADD COLUMN tipo_media varchar(10) DEFAULT 'foto',-- 'foto' o 'video'
ADD COLUMN video_url text;                       -- se tipo_media = 'video', link al video

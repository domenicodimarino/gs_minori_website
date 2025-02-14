-- Table: public.concorsi

-- DROP TABLE IF EXISTS public.concorsi;

CREATE TABLE IF NOT EXISTS public.concorsi
(
    id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    titolo character varying(255) COLLATE pg_catalog."default" NOT NULL,
    descrizione text COLLATE pg_catalog."default" NOT NULL,
    immagine character varying(255) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT concorsi_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.concorsi
    OWNER to www;
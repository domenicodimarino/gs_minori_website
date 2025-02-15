-- Table: public.news

-- DROP TABLE IF EXISTS public.news;

CREATE TABLE IF NOT EXISTS public.news
(
    id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    id_immagine integer NOT NULL,
    titolo character varying COLLATE pg_catalog."default" NOT NULL,
    descrizione text COLLATE pg_catalog."default" NOT NULL,
    contenuto text COLLATE pg_catalog."default" NOT NULL,
    data_pubblicazione timestamp without time zone,
    CONSTRAINT fk_immagine FOREIGN KEY (id_immagine)
        REFERENCES public.immagini_newa (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.news
    OWNER to www;
-- Table: public.news

-- DROP TABLE IF EXISTS public.news;

CREATE TABLE IF NOT EXISTS public.news
(
    id integer NOT NULL DEFAULT nextval('news_id_seq'::regclass),
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
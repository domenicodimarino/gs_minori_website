-- Table: public.immagini_newa

-- DROP TABLE IF EXISTS public.immagini_newa;

CREATE TABLE IF NOT EXISTS public.immagini_newa
(
    id integer NOT NULL DEFAULT nextval('immagini_newa_id_seq'::regclass),
    immagine character varying(255) COLLATE pg_catalog."default",
    immagine_pc bytea,
    CONSTRAINT immagini_newa_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.immagini_newa
    OWNER to www;

COMMENT ON COLUMN public.immagini_newa.immagine_pc
    IS 'Immagine salvata sul database';
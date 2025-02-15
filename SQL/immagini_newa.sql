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
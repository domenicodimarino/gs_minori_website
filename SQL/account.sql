-- Table: public.account

-- DROP TABLE IF EXISTS public.account;

CREATE TABLE IF NOT EXISTS public.account
(
    nome character varying COLLATE pg_catalog."default" NOT NULL,
    cognome character varying COLLATE pg_catalog."default",
    username character varying COLLATE pg_catalog."default" NOT NULL,
    email character varying COLLATE pg_catalog."default" NOT NULL,
    password character varying COLLATE pg_catalog."default",
    CONSTRAINT account_pkey PRIMARY KEY (username)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.account
    OWNER to www;
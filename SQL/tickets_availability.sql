-- Table: public.ticket_availability

-- DROP TABLE IF EXISTS public.ticket_availability;

CREATE TABLE IF NOT EXISTS public.ticket_availability
(
    id integer NOT NULL DEFAULT nextval('ticket_availability_id_seq'::regclass),
    match_id integer NOT NULL,
    sector_id integer NOT NULL,
    available_quantity integer NOT NULL DEFAULT 0,
    sector_name character varying COLLATE pg_catalog."default",
    CONSTRAINT ticket_availability_pkey PRIMARY KEY (id),
    CONSTRAINT unique_match_sector UNIQUE (match_id, sector_id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.ticket_availability
    OWNER to www;

-- Table: public.product_inventory

-- DROP TABLE IF EXISTS public.product_inventory;

CREATE TABLE IF NOT EXISTS public.product_inventory
(
    product_id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    product_name character varying(255) COLLATE pg_catalog."default" NOT NULL,
    price numeric(10,2) NOT NULL,
    available_quantity integer NOT NULL DEFAULT 0,
    CONSTRAINT product_inventory_pkey PRIMARY KEY (product_id),
    CONSTRAINT product_inventory_product_name_key UNIQUE (product_name)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.product_inventory
    OWNER to www;
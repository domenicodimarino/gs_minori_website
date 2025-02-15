-- Table: public.community_posts

-- DROP TABLE IF EXISTS public.community_posts;

CREATE TABLE IF NOT EXISTS public.community_posts
(
    id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    contenuto text COLLATE pg_catalog."default" NOT NULL,
    data_pubblicazione timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT community_posts_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.community_posts
    OWNER to www;
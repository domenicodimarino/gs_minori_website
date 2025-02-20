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

DELETE FROM public.news
WHERE id = 6;

INSERT INTO public.news (id_immagine, titolo, descrizione, contenuto, data_pubblicazione)
VALUES 
(1, 
 'GS Minori trionfa nel campionato regionale',
 'La squadra conquista una vittoria importante in casa.',
 'Nella partita disputata ieri sera, GS Minori ha dominato il campo con un gioco solido e organizzato, realizzando un punteggio finale di 78-65. La prestazione dei giovani atleti è stata esemplare, con interventi decisivi sia in attacco che in difesa. L’allenatore ha evidenziato l’importanza del lavoro di squadra e della determinazione, fondamentali per raggiungere questo traguardo nel campionato regionale.', 
 '2025-02-20 18:30:00');

INSERT INTO public.news (id_immagine, titolo, descrizione, contenuto, data_pubblicazione)
VALUES 
(2, 
 'Evento benefico "Sostieni il Basket" GS Minori',
 'Una giornata di solidarietà per migliorare le strutture sportive.',
 'GS Minori organizza l’evento "Sostieni il Basket", una manifestazione benefica dedicata a raccogliere fondi per il potenziamento delle palestre e delle attrezzature. L’iniziativa, che vedrà la partecipazione di sponsor, tifosi e famiglie, comprende partite esibizione, stand gastronomici e intrattenimenti per i più piccoli. Un’occasione per unire sport e solidarietà in una giornata all’insegna del benessere e della comunità.', 
 '2025-02-21 16:00:00');

INSERT INTO public.news (id_immagine, titolo, descrizione, contenuto, data_pubblicazione)
VALUES 
(3, 
 'Preparativi per il torneo regionale: GS Minori in allenamento',
 'I ragazzi si preparano con impegno per il prossimo torneo.',
 'Con l’avvicinarsi del torneo regionale, la squadra di GS Minori intensifica gli allenamenti per affinare tattiche e strategie. Durante le sessioni, l’allenatore ha sottolineato l’importanza della coesione e della disciplina, elementi fondamentali per affrontare le sfide che verranno. L’intero gruppo si è impegnato per raggiungere livelli di prestazione sempre più alti e per rappresentare al meglio la società.', 
 '2025-02-22 14:00:00');

INSERT INTO public.news (id_immagine, titolo, descrizione, contenuto, data_pubblicazione)
VALUES 
(4, 
 'Partita amichevole: Giovani promesse in campo',
 'Un incontro per testare nuovi schemi e far emergere giovani talenti.',
 'In un match amichevole organizzato da GS Minori, la squadra ha dato spazio alle giovani promesse per sperimentare nuovi schemi di gioco. L’incontro ha offerto l’occasione di integrare i giovani nel sistema della prima squadra, favorendo la crescita e la visibilità dei talenti emergenti. Il clima in campo è stato positivo e costruttivo, dimostrando il forte legame tra esperienza e gioventù all’interno della società.', 
 '2025-02-23 17:00:00');

INSERT INTO public.news (id_immagine, titolo, descrizione, contenuto, data_pubblicazione)
VALUES 
(5, 
 'Sfida in trasferta: GS Minori contro la squadra ospite',
 'Una partita combattuta in una trasferta impegnativa.',
 'Durante la recente trasferta, GS Minori ha affrontato una squadra avversaria particolarmente forte. Nonostante le difficoltà, i ragazzi hanno mostrato spirito combattivo e determinazione, combattendo fino all’ultimo minuto. Il risultato finale, seppur non favorevole, evidenzia la capacità della squadra di affrontare ogni sfida con coraggio e professionalità, lasciando aperta la voglia di migliorare in vista delle prossime gare.', 
 '2025-02-24 20:00:00');

INSERT INTO public.news (id_immagine, titolo, descrizione, contenuto, data_pubblicazione)
VALUES 
(6, 
 'Workshop tecnico: Incontro per allenatori e giocatori',
 'Una giornata formativa per approfondire le tecniche di gioco.',
 'GS Minori ha ospitato un workshop dedicato a tecniche e strategie di gioco, rivolto sia agli allenatori che ai giocatori. L’evento ha visto la partecipazione di esperti del settore che hanno condiviso consigli su tattiche difensive e offensive, migliorando l’approccio tecnico della squadra. Questo incontro formativo rappresenta un investimento sulla crescita professionale dei componenti del gruppo e un passo importante per prepararsi alle sfide future.', 
 '2025-02-25 11:00:00');

INSERT INTO public.news (id_immagine, titolo, descrizione, contenuto, data_pubblicazione)
VALUES 
(6, 
 'Festa di fine stagione e premiazioni GS Minori',
 'Celebrazione degli impegni e dei successi della stagione.',
 'A conclusione di una stagione ricca di emozioni e successi, GS Minori ha organizzato una serata di festa e premiazioni. Durante l’evento, sono stati riconosciuti i migliori giocatori e il lavoro svolto da tutto lo staff tecnico. La serata, all’insegna della convivialità e della gratitudine, ha rafforzato lo spirito di squadra e l’orgoglio di far parte di una realtà sportiva che valorizza il talento e l’impegno di ciascun componente.', 
 '2025-02-26 21:00:00');

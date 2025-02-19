-- Inserimenti di prova per la tabella immagini_newa
INSERT INTO public.immagini_newa (immagine, immagine_pc) VALUES
('https://media.gettyimages.com/id/467743832/it/foto/basketball-arena.jpg?s=2048x2048&w=gi&k=20&c=z2ihk3VtAclqIgl8yTMVHDrRI91O5IIR79vzHt7tSMk=', NULL),
('https://media.gettyimages.com/id/467743832/it/foto/basketball-arena.jpg?s=2048x2048&w=gi&k=20&c=z2ihk3VtAclqIgl8yTMVHDrRI91O5IIR79vzHt7tSMk=', NULL),
('https://media.gettyimages.com/id/467743832/it/foto/basketball-arena.jpg?s=2048x2048&w=gi&k=20&c=z2ihk3VtAclqIgl8yTMVHDrRI91O5IIR79vzHt7tSMk=', NULL);

-- Inserimenti di prova per la tabella news
INSERT INTO public.news (id_immagine, titolo, descrizione, contenuto, data_pubblicazione) VALUES
(1, 'Titolo Notizia 1', 'Descrizione breve della notizia 1', 'Contenuto dettagliato della notizia 1', '2025-02-15 10:00:00'),
(2, 'Titolo Notizia 2', 'Descrizione breve della notizia 2', 'Contenuto dettagliato della notizia 2', '2025-02-14 09:30:00'),
(3, 'Titolo Notizia 3', 'Descrizione breve della notizia 3', 'Contenuto dettagliato della notizia 3', '2025-02-13 08:45:00');

-- Inserimenti di prova per la tabella concorsi
INSERT INTO public.concorsi (titolo, descrizione, immagine) VALUES
('Concorso 1', 'Descrizione del concorso 1', 'https://media.gettyimages.com/id/200430632-001/it/foto/basketball-on-basketball-court-elevated-view.jpg?s=1024x1024&w=gi&k=20&c=Xz_eMY5GT-Hmt772Pzy2nps7Onk86unbymy9myeZymk='),
('Concorso 2', 'Descrizione del concorso 2', 'https://media.gettyimages.com/id/200430632-001/it/foto/basketball-on-basketball-court-elevated-view.jpg?s=1024x1024&w=gi&k=20&c=Xz_eMY5GT-Hmt772Pzy2nps7Onk86unbymy9myeZymk='),
('Concorso 3', 'Descrizione del concorso 3', 'https://media.gettyimages.com/id/200430632-001/it/foto/basketball-on-basketball-court-elevated-view.jpg?s=1024x1024&w=gi&k=20&c=Xz_eMY5GT-Hmt772Pzy2nps7Onk86unbymy9myeZymk=');

-- Inserimenti di prova per la tabella community_posts
INSERT INTO public.community_posts (contenuto, data_pubblicazione, nome_utente, immagine) 
VALUES 
('Questo è il mio primo post nella community!', CURRENT_TIMESTAMP, 'MarioRossi', 'https://media.gettyimages.com/id/1354175053/it/foto/due-amici-stanno-saltando-per-prendere-una-palla-da-basket-sul-campo-centrale.jpg?s=2048x2048&w=gi&k=20&c=YdYgs8-VMMNfwzOCGgmpU2GwzeK3-qyGZjbrNbhTZ9A='),
('Oggi grande partita! Forza squadra!', CURRENT_TIMESTAMP, 'LucaBianchi', NULL),
('Chi viene alla prossima partita?', CURRENT_TIMESTAMP, 'SaraVerdi', 'https://media.gettyimages.com/id/1354175053/it/foto/due-amici-stanno-saltando-per-prendere-una-palla-da-basket-sul-campo-centrale.jpg?s=2048x2048&w=gi&k=20&c=YdYgs8-VMMNfwzOCGgmpU2GwzeK3-qyGZjbrNbhTZ9A=');


INSERT INTO public.concorsi (titolo, descrizione, immagine)
VALUES
('Vinci la maglia ufficiale',
 'Partecipa al concorso e potresti vincere la maglia ufficiale di GS Minori autografata dai giocatori.',
 'https://media.canva.com/v2/files/uri:ifs%3A%2F%2FM%2Fd6fcad19-e21a-487f-8ca9-521d778743d7?csig=AAAAAAAAAAAAAAAAAAAAAFKKIl2HVbuIJ9_HFpTNns0Vu9QR26ZJiunuYUGyTIZU&exp=1739981333&signer=media-rpc&token=AAIAAU0AJGQ2ZmNhZDE5LWUyMWEtNDg3Zi04Y2E5LTUyMWQ3Nzg3NDNkNwAAAAABlR74IghX8ROBfcYr5zlxUfwRtLCf81kwmfVmlEn-yTea18Truw'),

('Gadget Summer Pack',
 'Entra nel sorteggio per ricevere un kit di gadget estivi, tra cui cappellino, asciugamano e borsone personalizzato GS Minori.',
 'https://media.canva.com/v2/files/uri:ifs%3A%2F%2FM%2F040c402e-1e70-4223-a2bf-809041b77e20?csig=AAAAAAAAAAAAAAAAAAAAAFnpUnoEOsOXQgkGINCwwmavYangjkJNxM0C02voUGwh&exp=1739981317&signer=media-rpc&token=AAIAAU0AJDA0MGM0MDJlLTFlNzAtNDIyMy1hMmJmLTgwOTA0MWI3N2UyMAAAAAABlR7344iHQxfqPO9UTeVER2-zfdQ6Ns5U7u6IP1VmE7C_HYzCNw'),

('Tour VIP con la squadra',
 'Vivi un esperienza unica: vinci un pass VIP per un allenamento e un incontro con la prima squadra, con foto e autografi.',
 'https://media.canva.com/v2/files/uri:ifs%3A%2F%2FM%2F5b4eaefc-26d8-42b2-a823-96abb74bf8da?csig=AAAAAAAAAAAAAAAAAAAAAN-AfY9NkqNDfgDKY3JnBBZhPq9vHp6Beo0CKS417M2N&exp=1739983410&signer=media-rpc&token=AAIAAU0AJDViNGVhZWZjLTI2ZDgtNDJiMi1hODIzLTk2YWJiNzRiZjhkYQAAAAABlR8X01B10rizXSxSyQQA4kJyoKmU4XMpbjKypbrYuDLXKzCdYA'),

('Fan del Mese',
 'Dimostra il tuo supporto e diventa "Fan del Mese" con premi esclusivi come la t-shirt celebrativa e un trofeo personalizzato.',
 'https://media.canva.com/v2/files/uri:ifs%3A%2F%2FM%2F8660d099-0c67-4ab8-a459-74f708aace3e?csig=AAAAAAAAAAAAAAAAAAAAAE4b1Z3NuwVghrzDacIpUZSjdCW_mAVOVNuNwd4Dkg1y&exp=1739980683&signer=media-rpc&token=AAIAAU0AJDg2NjBkMDk5LTBjNjctNGFiOC1hNDU5LTc0ZjcwOGFhY2UzZQAAAAABlR7uNvjqiXhhQf2_FAMPbAZAvf1Ku924QCTnOKU6pDbP4fwVig'),

('Vinci il pallone da gioco',
 'Un concorso imperdibile per gli amanti del basket: in palio il pallone ufficiale utilizzato nelle partite, firmato dai giocatori.',
 'https://media.canva.com/v2/files/uri:ifs%3A%2F%2FM%2F144dc964-a003-4c8b-99c4-5eb9cf816cbb?csig=AAAAAAAAAAAAAAAAAAAAADKST0ei_ihaJ403swm2OwOHtXTXqDDdHDcz79panp4C&exp=1739980232&signer=media-rpc&token=AAIAAU0AJDE0NGRjOTY0LWEwMDMtNGM4Yi05OWM0LTVlYjljZjgxNmNiYgAAAAABlR7nVUDaK12gnNGU6BLx7pkNyL0Q2iticPt_VHFHVM-vW5MCpQ');

INSERT INTO tickets_availability (match_id, sector_id, available, price)
VALUES (1, 1, 100, 10.00);

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


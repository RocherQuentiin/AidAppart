-- Ajout des données dans la base de données Aidappart
-- Les données sont fictives
-- Les données sont ajoutées pour tester les requêtes SQL

-- Les données sont ajoutées dans l'ordre suivant:
-- 1. Personne
-- 2. Adresse
-- 3. Logement
-- 4. Messagerie
-- 5. studio
-- 6. Appartement
-- 7. Aviscss
-- 8. Annonce
-- 9. Favoris_Signalement
-- 10. Candidature
-- 11. Garent

INSERT INTO Personne (nom, prénom, email, actif, telephone, mdp) VALUES
('Dupont', 'Jean', 'jean.dupont@example.com', 1, '0600000001', 'password1'),
('Fathi', 'Marie', 'marie.martin@example.com', 1, '0600000002', 'password2'),
('Bernard', 'Pierre', 'pierre.bernard@example.com', 1, '0600000003', 'password3'),
('Dubois', 'Luc', 'luc.dubois@example.com', 1, '0600000004', 'password4'),
('Thomas', 'Julie', 'julie.thomas@example.com', 1, '0600000005', 'password5'),
('Robert', 'Sophie', 'sophie.robert@example.com', 1, '0600000006', 'password6'),
('Richard', 'Paul', 'paul.richard@example.com', 1, '0600000007', 'password7'),
('Petit', 'Laura', 'laura.petit@example.com', 1, '0600000008', 'password8'),
('Durand', 'Nicolas', 'nicolas.durand@example.com', 1, '0600000009', 'password9'),
('Leroy', 'Emma', 'emma.leroy@example.com', 1, '0600000010', 'password10'),
('Moreau', 'Lucas', 'lucas.moreau@example.com', 1, '0600000011', 'password11'),
('Simon', 'Chloe', 'chloe.simon@example.com', 1, '0600000012', 'password12'),
('Laurent', 'Hugo', 'hugo.laurent@example.com', 1, '0600000013', 'password13'),
('Lefebvre', 'Alice', 'alice.lefebvre@example.com', 0, '0600000014', 'password14'),
('Michel', 'Louis', 'louis.michel@example.com', 1, '0600000015', 'password15'),
('Garcia', 'Camille', 'camille.garcia@example.com', 1, '0600000016', 'password16'),
('David', 'Thomas', 'thomas.david@example.com', 1, '0600000017', 'password17'),
('Bertrand', 'Sarah', 'sarah.bertrand@example.com', 1, '0600000018', 'password18'),
('Roux', 'Antoine', 'antoine.roux@example.com', 1, '0600000019', 'password19'),
('Vincent', 'Manon', 'manon.vincent@example.com', 1, '0600000020', 'password20');

INSERT INTO Adresse (numero, rue, code_postal, ville) VALUES
(1, 'Rue de la Paix', 75001, 'Paris'),
(2, 'Avenue des Champs-Élysées', 75008, 'Paris'),
(3, 'Boulevard Saint-Germain', 75006, 'Paris'),
(4, 'Rue de Rivoli', 75004, 'Toulouse'),
(5, 'Rue du Faubourg Saint-Honoré', 75008, 'Paris'),
(6, 'Avenue Montaigne', 75008, 'Paris'),
(7, 'Rue de la Boétie', 75008, 'Lille'),
(8, 'Rue de Vaugirard', 75006, 'Paris'),
(9, 'Rue de Rennes', 75006, 'Lyon'),
(10, 'Rue de la Pompe', 75016, 'Paris'),
(11, 'Rue de Passy', 75016, 'Paris'),
(12, 'Rue de la Faisanderie', 75016, 'Marseille'),
(13, 'Rue de la Tour', 75016, 'Paris'),
(14, 'Rue de la Convention', 75015, 'Paris'),
(15, 'Rue de Lourmel', 75015, 'Paris');

INSERT INTO Logement (type, surface, proprietaire, loyer, charges, creer_a, adresse, est_meuble, a_WIFI, est_accessible_PMR, nb_pieces, a_parking, description) VALUES
('Appartement', 50, 1, 1200, 100, '2023-01-01', 1, 1, 1, 1, 2, 1, 'Appartement moderne avec vue sur la tour Eiffel'),
('studio', 120, 2, 2500, 200, '2023-01-02', 2, 1, 1, 1, 5, 1, 'studio spacieuse avec jardin'),
('Résidence', 30, 3, 800, 50, '2023-01-03', 3, 1, 1, 1, 1, 0, 'Petit appartement cosy'),
('studio', 150, 4, 3000, 250, '2023-01-04', 4, 1, 1, 1, 6, 1, 'Grande studio familiale'),
('Appartement', 45, 5, 1100, 90, '2023-01-05', 5, 1, 1, 1, 2, 0, 'Appartement lumineux'),
('studio', 200, 6, 3500, 300, '2023-01-06', 6, 1, 1, 1, 7, 1, 'studio de luxe avec piscine'),
('Appartement', 60, 7, 1400, 120, '2023-01-07', 7, 1, 1, 1, 3, 1, 'Appartement spacieux'),
('studio', 180, 8, 3200, 270, '2023-01-08', 8, 1, 1, 1, 6, 1, 'studio moderne avec jardin'),
('Chambre', 35, 9, 900, 70, '2023-01-09', 9, 1, 1, 1, 1, 0, 'Appartement bien situé'),
('studio', 160, 10, 2800, 230, '2023-01-10', 10, 1, 1, 1, 5, 1, 'studio confortable'),
('Appartement', 55, 11, 1300, 110, '2023-01-11', 11, 1, 1, 1, 2, 1, 'Appartement moderne'),
('studio', 190, 12, 3400, 290, '2023-01-12', 12, 1, 1, 1, 7, 1, 'studio spacieuse avec jardin'),
('Colocation', 40, 13, 1000, 80, '2023-01-13', 13, 1, 1, 1, 1, 0, 'Appartement cosy'),
('studio', 170, 14, 3100, 260, '2023-01-14', 14, 1, 1, 1, 6, 1, 'studio familiale'),
('Appartement', 65, 15, 1500, 130, '2023-01-15', 15, 1, 1, 1, 3, 1, 'Appartement spacieux et lumineux');

INSERT INTO Messagerie (id_personne, id_personne_destinataire, message, creer_a) VALUES
(1, 2, 'Bonjour, comment ça va?', '2023-01-01'),
(2, 1, 'Ça va bien, merci!', '2023-01-02'),
(3, 4, 'Salut, tu es disponible ce week-end?', '2023-01-03'),
(4, 3, 'Oui, je suis libre dimanche.', '2023-01-04'),
(5, 6, 'On se voit demain?', '2023-01-05'),
(6, 5, 'Oui, à quelle heure?', '2023-01-06'),
(7, 8, 'Tu as vu le dernier film?', '2023-01-07');

INSERT INTO Maison (id_logement, nb_etages, a_jardin) VALUES
(2, 2, 1),
(4, 3, 1),
(6, 2, 1),
(8, 2, 1),
(10, 2, 1),
(12, 3, 1),
(14, 2, 1);

INSERT INTO Appartement (id_logement, etage, a_ascenseur, a_balcon, a_concierge) VALUES
(1, 3, 1, 1, 0),
(3, 1, 0, 0, 0),
(5, 2, 1, 0, 0),
(7, 4, 1, 1, 1),
(9, 1, 0, 0, 0),
(11, 5, 1, 1, 1),
(13, 2, 1, 0, 0),
(15, 3, 1, 1, 1);

INSERT INTO Avis (id_logement, note, commentaire, creer_a) VALUES
(1, 5, 'Excellent logement!', '2023-01-01'),
(2, 4, 'Très bien, mais un peu cher.', '2023-01-02'),
(3, 3, 'Correct, sans plus.', '2023-01-03'),
(4, 5, 'Parfait pour une famille.', '2023-01-04'),
(5, 4, 'Bon rapport qualité/prix.', '2023-01-05'),
(6, 5, 'studio de rêve!', '2023-01-06'),
(7, 3, 'Appartement moyen.', '2023-01-07');

INSERT INTO Annonce (id_logement, creer_a, loueur, a_colocation, disponibilite, nb_personnes, statut, info_complementaire) VALUES
(1, '2023-01-01', 1, 0, '2023-02-01', 1, 'disponible', 'Aucune'),
(2, '2023-01-02', 2, 0, '2023-03-01', 1, 'disponible', 'Aucune'),
(3, '2023-01-03', 3, 1, '2023-04-01', 5, 'disponible', 'Aucune'),
(4, '2023-01-04', 4, 0, '2023-05-01', 1, 'disponible', 'Aucune'),
(5, '2023-01-05', 5, 1, '2023-06-01', 2, 'disponible', 'Aucune'),
(6, '2023-01-06', 6, 1, '2023-07-01', 7, 'disponible', 'Aucune'),
(7, '2023-01-07', 7, 1, '2023-08-01', 3, 'disponible', 'Aucune');

INSERT INTO Favoris_Signalement (id_personne, id_logement, creer_a, statut, commentaire) VALUES
(1, 1, '2023-01-01', 'favoris', 'Super logement!'),
(2, 2, '2023-01-02', 'signalement', 'Trop cher.'),
(3, 3, '2023-01-03', 'favoris', 'Bien situé.'),
(4, 4, '2023-01-04', 'signalement', 'Pas assez spacieux.'),
(5, 5, '2023-01-05', 'favoris', 'Bon rapport qualité/prix.'),
(6, 6, '2023-01-06', 'signalement', 'Trop bruyant.'),
(7, 7, '2023-01-07', 'favoris', 'Appartement moderne.');

INSERT INTO Candidature (id_personne, id_annonce, creer_a, statut) VALUES
(1, 1, '2023-01-01', 'en_attente'),
(2, 2, '2023-01-02', 'en_attente'),
(3, 3, '2023-01-03', 'en_attente'),
(4, 4, '2023-01-04', 'en_attente'),
(5, 5, '2023-01-05', 'en_attente'),
(6, 6, '2023-01-06', 'en_attente'),
(7, 7, '2023-01-07', 'en_attente');

INSERT INTO Garent (id_personne, id_logement, montant, lien_affiliation, creer_a) VALUES
(1, 1, 500, 'Parents', '2023-01-01'),
(2, 2, 600, 'Amis', '2023-01-02'),
(3, 3, 700, 'Proche', '2023-01-03'),
(4, 4, 800, 'Autre', '2023-01-04'),
(5, 5, 900, 'Parents', '2023-01-05'),
(6, 6, 1000, 'Amis', '2023-01-06'),
(7, 7, 1100, 'Proche', '2023-01-07');

INSERT INTO Personne_Role (id_personne, id_role) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 2),
(6, 3),
(7, 4),
(8, 2),
(9, 3),
(10, 4);
CREATE DATABASE Aidappart;
USE Aidappart;

/*CREATE USER 'default_user'@'localhost' IDENTIFIED BY 'AidappartNova';
GRANT ALL PRIVILEGES ON Aidappart.* TO 'default_user'@'localhost';
FLUSH PRIVILEGES;*/

CREATE TABLE Personne (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prénom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    actif BOOLEAN NOT NULL default(0),
    telephone VARCHAR(255) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL
);

CREATE TABLE Messagerie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_personne INT NOT NULL,
    id_personne_destinataire INT NOT NULL,
    message TEXT NOT NULL,
    creer_a DATE NOT NULL,
    FOREIGN KEY (id_personne) REFERENCES Personne(id) ON DELETE CASCADE,
    FOREIGN KEY (id_personne_destinataire) REFERENCES Personne(id) ON DELETE CASCADE
);

CREATE TABLE Logement (
    id INT PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR(255) NOT NULL,
    surface INT NOT NULL,
    proprietaire INT NOT NULL,
    loyer INT NOT NULL,
    charges INT NOT NULL,
    creer_a DATE NOT NULL,
    adresse INT NOT NULL,
    est_meuble BOOLEAN NOT NULL,
    a_WIFI BOOLEAN NOT NULL,
    est_accessible_PMR BOOLEAN NOT NULL,
    nb_pieces INT NOT NULL,
    a_parking BOOLEAN NOT NULL,
    description TEXT NOT NULL,
    FOREIGN KEY (proprietaire) REFERENCES Personne(id) ON DELETE CASCADE
);

CREATE TABLE Adresse (
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero INT NOT NULL,
    rue VARCHAR(255) NOT NULL,
    code_postal INT NOT NULL,
    ville VARCHAR(255) NOT NULL
);

CREATE TABLE Maison (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_logement INT NOT NULL,
    nb_etages INT NOT NULL,
    a_jardin BOOLEAN NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES Logement(id) ON DELETE CASCADE
);

CREATE TABLE Appartement (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_logement INTEGER NOT NULL,
    etage INTEGER NOT NULL,
    a_ascenseur BOOLEAN NOT NULL,
    a_balcon BOOLEAN NOT NULL,
    a_concierge BOOLEAN NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES Logement(id) ON DELETE CASCADE
);

CREATE TABLE Avis (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_logement INT NOT NULL,
    note INT NOT NULL,
    commentaire TEXT NOT NULL,
    creer_a DATE NOT NULL DEFAULT CURRENT_DATE,
    FOREIGN KEY (id_logement) REFERENCES Logement(id) ON DELETE CASCADE
);

CREATE TABLE Annonce (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_logement INT NOT NULL,
    creer_a DATE NOT NULL DEFAULT CURRENT_DATE,
    loueur INT NOT NULL,
    a_colocation BOOLEAN NOT NULL,
    disponibilite DATE NOT NULL,
    nb_personnes INT NOT NULL,
    statut ENUM('disponible', 'reservé', 'loué') NOT NULL,
    info_complementaire TEXT NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES Logement(id) ON DELETE CASCADE,
    FOREIGN KEY (loueur) REFERENCES Personne(id) ON DELETE CASCADE
);

CREATE TABLE Favoris_Signalement (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_personne INT NOT NULL,
    id_logement INT NOT NULL,
    creer_a DATE NOT NULL DEFAULT CURRENT_DATE,
    statut ENUM('favoris', 'signalement') NOT NULL,
    commentaire TEXT NOT NULL,
    FOREIGN KEY (id_personne) REFERENCES Personne(id) ON DELETE CASCADE,
    FOREIGN KEY (id_logement) REFERENCES Logement(id) ON DELETE CASCADE
);

CREATE TABLE Candidature (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_personne INT NOT NULL,
    id_annonce INT NOT NULL,
    creer_a DATE NOT NULL DEFAULT CURRENT_DATE,
    statut ENUM('accepté', 'refusé', 'en_attente') NOT NULL,
    FOREIGN KEY (id_personne) REFERENCES Personne(id) ON DELETE CASCADE,
    FOREIGN KEY (id_annonce) REFERENCES Annonce(id) ON DELETE CASCADE
);

CREATE TABLE Garent (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_personne INT NOT NULL,
    id_logement INT NOT NULL,
    montant INT NOT NULL,
    lien_affiliation ENUM('Parents', 'Amis', 'Proche', 'Autre') NOT NULL,
    creer_a DATE NOT NULL DEFAULT CURRENT_DATE,
    FOREIGN KEY (id_personne) REFERENCES Personne(id) ON DELETE CASCADE,
    FOREIGN KEY (id_logement) REFERENCES Logement(id) ON DELETE CASCADE
);

CREATE TABLE Role (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL UNIQUE,
    description TEXT NOT NULL
);

INSERT INTO Role (nom, description) VALUES
('Admin', 'Administrateur du système'),
('Propriétaire', 'Propriétaire d\"un ou plusieurs logement'),
('Etudiant', 'Recherche un logement'),
('Visiteur', 'Visiteur du site');

CREATE TABLE Personne_Role (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_personne INT NOT NULL,
    id_role INT NOT NULL,
    FOREIGN KEY (id_personne) REFERENCES Personne(id) ON DELETE CASCADE,
    FOREIGN KEY (id_role) REFERENCES Role(id) ON DELETE CASCADE
);

ALTER TABLE Personne ADD creer_a DATE NOT NULL DEFAULT CURRENT_DATE;

ALTER TABLE Logement ADD CONSTRAINT fk_adresse FOREIGN KEY (adresse) REFERENCES Adresse(id);
ALTER TABLE Logement
ADD COLUMN statut BOOLEAN DEFAULT FALSE;
ALTER TABLE Favoris_Signalement MODIFY creer_a DATE NOT NULL DEFAULT CURRENT_DATE;

ALTER TABLE Messagerie MODIFY creer_a DATE NOT NULL DEFAULT CURRENT_DATE;
ALTER TABLE Logement MODIFY creer_a DATE NOT NULL DEFAULT CURRENT_DATE;
ALTER TABLE Avis MODIFY creer_a DATE NOT NULL DEFAULT CURRENT_DATE;
ALTER TABLE Annonce MODIFY creer_a DATE NOT NULL DEFAULT CURRENT_DATE;
ALTER TABLE Candidature MODIFY creer_a DATE NOT NULL DEFAULT CURRENT_DATE;
ALTER TABLE Garent MODIFY creer_a DATE NOT NULL DEFAULT CURRENT_DATE;

ALTER TABLE Messagerie ADD CONSTRAINT fk_messagerie_personne FOREIGN KEY (id_personne) REFERENCES Personne(id) ON DELETE CASCADE;
ALTER TABLE Messagerie ADD CONSTRAINT fk_messagerie_personne_destinataire FOREIGN KEY (id_personne_destinataire) REFERENCES Personne(id) ON DELETE CASCADE;
ALTER TABLE Logement ADD CONSTRAINT fk_logement_proprietaire FOREIGN KEY (proprietaire) REFERENCES Personne(id) ON DELETE CASCADE;
ALTER TABLE Logement ADD CONSTRAINT fk_logement_adresse FOREIGN KEY (adresse) REFERENCES Adresse(id) ON DELETE CASCADE;


ALTER TABLE Maison ADD CONSTRAINT fk_maison_logement FOREIGN KEY (id_logement) REFERENCES Logement(id) ON DELETE CASCADE;
ALTER TABLE Appartement ADD CONSTRAINT fk_appartement_logement FOREIGN KEY (id_logement) REFERENCES Logement(id) ON DELETE CASCADE;
ALTER TABLE Avis ADD CONSTRAINT fk_avis_logement FOREIGN KEY (id_logement) REFERENCES Logement(id) ON DELETE CASCADE;
ALTER TABLE Annonce ADD CONSTRAINT fk_annonce_logement FOREIGN KEY (id_logement) REFERENCES Logement(id) ON DELETE CASCADE;
ALTER TABLE Annonce ADD CONSTRAINT fk_annonce_loueur FOREIGN KEY (loueur) REFERENCES Personne(id) ON DELETE CASCADE;
ALTER TABLE Favoris_Signalement ADD CONSTRAINT fk_favoris_signalement_personne FOREIGN KEY (id_personne) REFERENCES Personne(id) ON DELETE CASCADE;
ALTER TABLE Favoris_Signalement ADD CONSTRAINT fk_favoris_signalement_logement FOREIGN KEY (id_logement) REFERENCES Logement(id) ON DELETE CASCADE;
ALTER TABLE Candidature ADD CONSTRAINT fk_candidature_personne FOREIGN KEY (id_personne) REFERENCES Personne(id) ON DELETE CASCADE;
ALTER TABLE Candidature ADD CONSTRAINT fk_candidature_annonce FOREIGN KEY (id_annonce) REFERENCES Annonce(id) ON DELETE CASCADE;
ALTER TABLE Garent ADD CONSTRAINT fk_garent_personne FOREIGN KEY (id_personne) REFERENCES Personne(id) ON DELETE CASCADE;
ALTER TABLE Garent ADD CONSTRAINT fk_garent_logement FOREIGN KEY (id_logement) REFERENCES Logement(id) ON DELETE CASCADE;
ALTER TABLE Personne_Role ADD CONSTRAINT fk_personne_role_personne FOREIGN KEY (id_personne) REFERENCES Personne(id) ON DELETE CASCADE;
ALTER TABLE Personne_Role ADD CONSTRAINT fk_personne_role_role FOREIGN KEY (id_role) REFERENCES Role(id) ON DELETE CASCADE;

ALTER TABLE Personne ADD COLUMN etat ENUM("actif", "inactif", "bloqué") DEFAULT "inactif";

INSERT INTO `Personne` (`id`, `nom`, `prénom`, `email`, `actif`, `telephone`, `mdp`, `creer_a`, `etat`) VALUES (NULL, 'amdin', 'admin', 'admin@nova.fr', '1', '1234', '$2y$10$JYNpn92Y77y.v8aX2mm1New3SCfnG8vXsD0A71BRCps.ax4frXAUq', '2024-12-19', 'actif');
INSERT INTO `Personne_Role` (`id`, `id_personne`, `id_role`) VALUES (NULL, '1', '1')
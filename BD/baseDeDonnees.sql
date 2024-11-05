CREATE DATABASE IF NOT EXISTS Aidappart;
USE Aidappart;

CREATE USER 'default_user'@'localhost' IDENTIFIED BY 'AidappartNova';
GRANT ALL PRIVILEGES ON Aidappart.* TO 'default_user'@'localhost';
FLUSH PRIVILEGES;

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
    FOREIGN KEY (id_personne) REFERENCES Personne(id),
    FOREIGN KEY (id_personne_destinataire) REFERENCES Personne(id)
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
    FOREIGN KEY (proprietaire) REFERENCES Personne(id)
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
    FOREIGN KEY (id_logement) REFERENCES Logement(id)
); 

CREATE TABLE Maison (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_logement INTEGER NOT NULL,
    nb_etages INTEGER NOT NULL,
    a_jardin BOOLEAN NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES Logement(id)
); 

CREATE TABLE Maison (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_logement INTEGER NOT NULL,
    nb_etages INTEGER NOT NULL,
    a_jardin BOOLEAN NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES Logement(id)
);

CREATE TABLE Appartement (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_logement INTEGER NOT NULL,
    etage INTEGER NOT NULL,
    a_ascenseur BOOLEAN NOT NULL, 
    a_balcon BOOLEAN NOT NULL,
    a_concierge BOOLEAN NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES Logement(id)
);

CREATE TABLE Appartement (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_logement INTEGER NOT NULL,
    etage INTEGER NOT NULL,
    a_ascenseur BOOLEAN NOT NULL, 
    a_balcon BOOLEAN NOT NULL,
    a_concierge BOOLEAN NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES Logement(id)
);

CREATE TABLE Maison (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_logement INTEGER NOT NULL,
    nb_etages INTEGER NOT NULL,
    a_jardin BOOLEAN NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES Logement(id)
);

CREATE TABLE Maison (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_logement INTEGER NOT NULL,
    nb_etages INTEGER NOT NULL,
    a_jardin BOOLEAN NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES Logement(id)
);

CREATE TABLE Appartement (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_logement INT NOT NULL,
    etage INT NOT NULL,
    a_ascenseur BOOLEAN NOT NULL,
    a_balcon BOOLEAN NOT NULL,
    a_concierge BOOLEAN NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES Logement(id)
);

CREATE TABLE Maison (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
);

CREATE TABLE Messagerie (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_personne INTEGER NOT NULL,
    id_personne_destinataire INTEGER NOT NULL,
    message TEXT NOT NULL,
    date DATE NOT NULL,
    FOREIGN KEY (id_personne) REFERENCES Personne(id),
    FOREIGN KEY (id_personne_destinataire) REFERENCES Personne(id)
);
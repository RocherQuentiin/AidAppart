CREATE TABLE Personne (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    prénom TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    actif BOOLEAN NOT NULL,
    telephone TEXT NOT NULL UNIQUE,
    mdp TEXT NOT NULL hash
    docs file,
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

CREATE TABLE Logement (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    type TEXT NOT NULL,
    surface INTEGER NOT NULL,
    proprietaire INTEGER NOT NULL,
    loyer INTEGER NOT NULL,
    charges INTEGER NOT NULL,
    date DATE NOT NULL,
    adresse INTEGER NOT NULL,
    est_meuble BOOLEAN NOT NULL,
    a_WIFI BOOLEAN NOT NULL,
    est_accessible_PMR BOOLEAN NOT NULL,
    nb_pieces INTEGER NOT NULL,
    a_parking BOOLEAN NOT NULL,
    description TEXT NOT NULL,
    FOREIGN KEY (proprietaire) REFERENCES Personne(id)
);

CREATE TABLE Adresse (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    numero INTEGER NOT NULL,
    rue TEXT NOT NULL,
    code_postal INTEGER NOT NULL,
    ville TEXT NOT NULL,
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

CREATE TABLE Avis (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_logement INTEGER NOT NULL,
    note INTEGER NOT NULL,
    commentaire TEXT NOT NULL,
    date DATE NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES Logement(id)
);
Update Logement FOREIGN KEY (adresse) REFERENCES Adresse(id);
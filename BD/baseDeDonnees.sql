CREATE TABLE Personne (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    prénom TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    actif BOOLEAN NOT NULL,
    telephone NOT NULL UNIQUE,
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
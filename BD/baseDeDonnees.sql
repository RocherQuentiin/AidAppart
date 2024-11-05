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


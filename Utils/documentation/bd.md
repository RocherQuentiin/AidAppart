# Schéma de la base de données Aidappart

## Tables

### Personne
| Colonne   | Type              | Contraintes                        |
|-----------|-------------------|------------------------------------|
| id        | INT               | PRIMARY KEY, AUTO_INCREMENT        |
| nom       | VARCHAR(255)      | NOT NULL                           |
| prénom    | VARCHAR(255)      | NOT NULL                           |
| email     | VARCHAR(255)      | NOT NULL, UNIQUE                   |
| actif     | BOOLEAN           | NOT NULL, DEFAULT 0                |
| telephone | VARCHAR(255)      | NOT NULL, UNIQUE                   |
| mdp       | VARCHAR(255)      | NOT NULL                           |
| creer_a   | DATE              | NOT NULL, DEFAULT CURRENT_DATE     |
| etat      | ENUM              | DEFAULT "inactif"                  |

### Messagerie
| Colonne                | Type     | Contraintes                        |
|------------------------|----------|------------------------------------|
| id                     | INT      | PRIMARY KEY, AUTO_INCREMENT        |
| id_personne            | INT      | NOT NULL, FOREIGN KEY              |
| id_personne_destinataire | INT    | NOT NULL, FOREIGN KEY              |
| message                | TEXT     | NOT NULL                           |
| creer_a                | DATE     | NOT NULL, DEFAULT CURRENT_DATE     |

### Logement
| Colonne                | Type        | Contraintes                        |
|------------------------|-------------|------------------------------------|
| id                     | INT         | PRIMARY KEY, AUTO_INCREMENT        |
| type                   | VARCHAR(255)| NOT NULL                           |
| surface                | INT         | NOT NULL                           |
| proprietaire           | INT         | NOT NULL, FOREIGN KEY              |
| loyer                  | INT         | NOT NULL                           |
| charges                | INT         | NOT NULL                           |
| creer_a                | DATE        | NOT NULL, DEFAULT CURRENT_DATE     |
| adresse                | INT         | NOT NULL, FOREIGN KEY              |
| est_meuble             | BOOLEAN     | NOT NULL                           |
| a_WIFI                 | BOOLEAN     | NOT NULL                           |
| est_accessible_PMR     | BOOLEAN     | NOT NULL                           |
| nb_pieces              | INT         | NOT NULL                           |
| a_parking              | BOOLEAN     | NOT NULL                           |
| description            | TEXT        | NOT NULL                           |
| statut                 | BOOLEAN     | DEFAULT FALSE                      |

### Adresse
| Colonne    | Type        | Contraintes                        |
|------------|-------------|------------------------------------|
| id         | INT         | PRIMARY KEY, AUTO_INCREMENT        |
| numero     | INT         | NOT NULL                           |
| rue        | VARCHAR(255)| NOT NULL                           |
| code_postal| INT         | NOT NULL                           |
| ville      | VARCHAR(255)| NOT NULL                           |

### Maison
| Colonne    | Type        | Contraintes                        |
|------------|-------------|------------------------------------|
| id         | INT         | PRIMARY KEY, AUTO_INCREMENT        |
| id_logement| INT         | NOT NULL, FOREIGN KEY              |
| nb_etages  | INT         | NOT NULL                           |
| a_jardin   | BOOLEAN     | NOT NULL                           |

### Appartement
| Colonne    | Type        | Contraintes                        |
|------------|-------------|------------------------------------|
| id         | INT         | PRIMARY KEY, AUTO_INCREMENT        |
| id_logement| INT         | NOT NULL, FOREIGN KEY              |
| etage      | INT         | NOT NULL                           |
| a_ascenseur| BOOLEAN     | NOT NULL                           |
| a_balcon   | BOOLEAN     | NOT NULL                           |
| a_concierge| BOOLEAN     | NOT NULL                           |

### Avis
| Colonne    | Type        | Contraintes                        |
|------------|-------------|------------------------------------|
| id         | INT         | PRIMARY KEY, AUTO_INCREMENT        |
| id_logement| INT         | NOT NULL, FOREIGN KEY              |
| note       | INT         | NOT NULL                           |
| commentaire| TEXT        | NOT NULL                           |
| creer_a    | DATE        | NOT NULL, DEFAULT CURRENT_DATE     |

### Annonce
| Colonne            | Type        | Contraintes                        |
|--------------------|-------------|------------------------------------|
| id                 | INT         | PRIMARY KEY, AUTO_INCREMENT        |
| id_logement        | INT         | NOT NULL, FOREIGN KEY              |
| creer_a            | DATE        | NOT NULL, DEFAULT CURRENT_DATE     |
| loueur             | INT         | NOT NULL, FOREIGN KEY              |
| a_colocation       | BOOLEAN     | NOT NULL                           |
| disponibilite      | DATE        | NOT NULL                           |
| nb_personnes       | INT         | NOT NULL                           |
| statut             | ENUM        | NOT NULL                           |
| info_complementaire| TEXT        | NOT NULL                           |

### Favoris_Signalement
| Colonne    | Type        | Contraintes                        |
|------------|-------------|------------------------------------|
| id         | INT         | PRIMARY KEY, AUTO_INCREMENT        |
| id_personne| INT         | NOT NULL, FOREIGN KEY              |
| id_logement| INT         | NOT NULL, FOREIGN KEY              |
| creer_a    | DATE        | NOT NULL, DEFAULT CURRENT_DATE     |
| statut     | ENUM        | NOT NULL                           |
| commentaire| TEXT        | NOT NULL                           |

### Candidature
| Colonne    | Type        | Contraintes                        |
|------------|-------------|------------------------------------|
| id         | INT         | PRIMARY KEY, AUTO_INCREMENT        |
| id_personne| INT         | NOT NULL, FOREIGN KEY              |
| id_annonce | INT         | NOT NULL, FOREIGN KEY              |
| creer_a    | DATE        | NOT NULL, DEFAULT CURRENT_DATE     |
| statut     | ENUM        | NOT NULL                           |

### Garent
| Colonne          | Type        | Contraintes                        |
|------------------|-------------|------------------------------------|
| id               | INT         | PRIMARY KEY, AUTO_INCREMENT        |
| id_personne      | INT         | NOT NULL, FOREIGN KEY              |
| id_logement      | INT         | NOT NULL, FOREIGN KEY              |
| montant          | INT         | NOT NULL                           |
| lien_affiliation | ENUM        | NOT NULL                           |
| creer_a          | DATE        | NOT NULL, DEFAULT CURRENT_DATE     |

### Role
| Colonne    | Type        | Contraintes                        |
|------------|-------------|------------------------------------|
| id         | INT         | PRIMARY KEY, AUTO_INCREMENT        |
| nom        | VARCHAR(255)| NOT NULL, UNIQUE                   |
| description| TEXT        | NOT NULL                           |

### Personne_Role
| Colonne    | Type        | Contraintes                        |
|------------|-------------|------------------------------------|
| id         | INT         | PRIMARY KEY, AUTO_INCREMENT        |
| id_personne| INT         | NOT NULL, FOREIGN KEY              |
| id_role    | INT         | NOT NULL, FOREIGN KEY              |

## Relations

- `Personne` a une relation avec `Messagerie`, `Logement`, `Annonce`, `Favoris_Signalement`, `Candidature`, `Garent`, et `Personne_Role`.
- `Logement` a une relation avec `Adresse`, `Maison`, `Appartement`, `Avis`, `Annonce`, `Favoris_Signalement`, et `Garent`.
- `Annonce` a une relation avec `Candidature`.
- `Role` a une relation avec `Personne_Role`.

## Schéma Entité-Relation

```mermaid
erDiagram
    Personne {
        INT id
        VARCHAR nom
        VARCHAR prenom
        VARCHAR email
        BOOLEAN actif
        VARCHAR telephone
        VARCHAR mdp
        DATE creer_a
        ENUM etat
    }
    Messagerie {
        INT id
        INT id_personne
        INT id_personne_destinataire
        TEXT message
        DATE creer_a
    }
    Logement {
        INT id
        VARCHAR type
        INT surface
        INT proprietaire
        INT loyer
        INT charges
        DATE creer_a
        INT adresse
        BOOLEAN est_meuble
        BOOLEAN a_WIFI
        BOOLEAN est_accessible_PMR
        INT nb_pieces
        BOOLEAN a_parking
        TEXT description
        BOOLEAN statut
    }
    Adresse {
        INT id
        INT numero
        VARCHAR rue
        INT code_postal
        VARCHAR ville
    }
    Maison {
        INT id
        INT id_logement
        INT nb_etages
        BOOLEAN a_jardin
    }
    Appartement {
        INT id
        INT id_logement
        INT etage
        BOOLEAN a_ascenseur
        BOOLEAN a_balcon
        BOOLEAN a_concierge
    }
    Avis {
        INT id
        INT id_logement
        INT note
        TEXT commentaire
        DATE creer_a
    }
    Annonce {
        INT id
        INT id_logement
        DATE creer_a
        INT loueur
        BOOLEAN a_colocation
        DATE disponibilite
        INT nb_personnes
        ENUM statut
        TEXT info_complementaire
    }
    Favoris_Signalement {
        INT id
        INT id_personne
        INT id_logement
        DATE creer_a
        ENUM statut
        TEXT commentaire
    }
    Candidature {
        INT id
        INT id_personne
        INT id_annonce
        DATE creer_a
        ENUM statut
    }
    Garent {
        INT id
        INT id_personne
        INT id_logement
        INT montant
        ENUM lien_affiliation
        DATE creer_a
    }
    Role {
        INT id
        VARCHAR nom
        TEXT description
    }
    Personne_Role {
        INT id
        INT id_personne
        INT id_role
    }

    Personne ||--o{ Messagerie : envoie
    Personne ||--o{ Logement : possede
    Personne ||--o{ Annonce : cree
    Personne ||--o{ Favoris_Signalement : marque
    Personne ||--o{ Candidature : soumet
    Personne ||--o{ Garent : garantit
    Personne ||--o{ Personne_Role : a
    Logement ||--o{ Adresse : localise
    Logement ||--o{ Maison : peut_etre
    Logement ||--o{ Appartement : peut_etre
    Logement ||--o{ Avis : recoit
    Logement ||--o{ Annonce : liste
    Logement ||--o{ Favoris_Signalement : marque
    Logement ||--o{ Garent : garanti
    Annonce ||--o{ Candidature : recoit
    Role ||--o{ Personne_Role : attribue

```
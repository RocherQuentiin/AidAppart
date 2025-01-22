# Documentation de l'Architecture du Projet AidAppart

## Introduction
Ce document décrit l'architecture du projet AidAppart, un site web permettant aux étudiants de trouver des logements. Le projet est structuré en plusieurs couches, chacune ayant un rôle spécifique.

## Model MVC

Le modèle MVC (Modèle-Vue-Contrôleur) est une architecture logicielle qui sépare une application en trois composants principaux : le Modèle, la Vue et le Contrôleur. Cette séparation permet de gérer plus facilement la complexité de l'application et de faciliter la maintenance et l'évolution du code.

### 1. Modèle (Model)
Le Modèle représente les données de l'application et la logique métier. Il interagit avec la base de données et contient les méthodes pour récupérer, insérer, mettre à jour et supprimer des données.

Exemple dans votre architecture :
- `Models/Model.php` : Ce fichier contient les méthodes pour interagir avec la base de données, comme la récupération des informations sur les logements.

### 2. Vue (View)
La Vue est responsable de l'affichage des données à l'utilisateur. Elle reçoit les données du Modèle et les présente sous une forme compréhensible.

Exemples dans votre architecture :
- `Views/view_accueil.php` : Affiche la page d'accueil.
- `Views/view_pagelogement.php` : Affiche la page de recherche de logements.

### 3. Contrôleur (Controller)
Le Contrôleur gère les interactions de l'utilisateur. Il reçoit les entrées de l'utilisateur, traite ces entrées en utilisant le Modèle et met à jour la Vue en conséquence.

Exemples dans votre architecture :
- `Controllers/Controller_accueil.php` : Gère les actions de la page d'accueil, comme la récupération des annonces de logements.
- `Controllers/Controller_ajoutLogement.php` : Gère les actions pour ajouter un logement, comme l'envoi des données du formulaire au Modèle pour insertion dans la base de données.

### Exemple de Flux MVC
1. Un utilisateur accède à la page d'accueil (`index.php`).
2. Le contrôleur `Controller_accueil.php` est appelé.
3. Le contrôleur utilise le modèle `Model.php` pour récupérer les données des logements.
4. Les données sont envoyées à la vue `view_accueil.php`.
5. La vue affiche les données à l'utilisateur.

Cette séparation en trois composants permet de rendre le code plus modulaire et plus facile à maintenir. Chaque composant a une responsabilité bien définie, ce qui facilite les modifications et les ajouts de fonctionnalités.


## Structure du Répertoire
Voici la structure des répertoires du projet :

```
AidAppart/
├── BD/
│   ├── baseDeDonnees.sql
│   ├── mock.sql
├── Content/
│   ├── css/
│   │   ├── accueil.css
│   │   ├── ajoutLogement.css
│   │   ├── connexion.css
│   │   ├── css_annonce.css
│   │   ├── footer.css
│   │   ├── index.css
│   │   ├── pageinscription.css
│   │   ├── pagelogement.css
│   │   ├── stylesheet.css
│   ├── Images/
│   ├── js/
│   │   ├── admin.js
│   │   ├── pageinscription_connexion.js
│   │   ├── pagelogement.js
├── Controllers/
│   ├── Controller.php
│   ├── Controller_accueil.php
│   ├── Controller_admin.php
│   ├── Controller_aide.php
│   ├── Controller_ajoutLogement.php
│   ├── Controller_connexion.php
│   ├── Controller_deconnexion.php
│   ├── Controller_inscription.php
│   ├── Controller_mdp_oublie.php
│   ├── Controller_pagelogement.php
├── Models/
│   ├── Model.php
├── Utils/
│   ├── config.php
│   ├── documentation/
│   │   ├── architecture.md
│   │   ├── model.md
│   │   ├── pdo.md
│   ├── functions.php
├── Views/
│   ├── Layout/
│   │   ├── footer.php
│   │   ├── view_header.php
│   ├── view_accueil.php
│   ├── view_admin.php
│   ├── view_aide.php
│   ├── view_ajoutLogement.php
│   ├── view_annonces.php
│   ├── view_connexion.php
│   ├── view_inscription.php
│   ├── view_mdp_oublie.php
│   ├── view_pagelogement.php
├── docker/
│   ├── nginx.conf
├── index.php
├── README.md
```

## Description des Composants

### 1. BD
Ce répertoire contient les scripts SQL pour la création et le peuplement de la base de données.

- `baseDeDonnees.sql` : Script de création de la base de données.
- `mock.sql` : Script pour insérer des données fictives pour les tests.

### 2. Content
Ce répertoire contient les fichiers statiques tels que les feuilles de style CSS, les images et les scripts JavaScript.

- `css/` : Contient les fichiers CSS pour le style des différentes pages.
- `Images/` : Contient les images utilisées sur le site.
- `js/` : Contient les fichiers JavaScript pour les interactions dynamiques.

### 3. Controllers
Ce répertoire contient les contrôleurs qui gèrent les différentes actions de l'application.

- `Controller.php` : Classe de base pour tous les contrôleurs.
- `Controller_accueil.php` : Gère les actions de la page d'accueil.
- `Controller_admin.php` : Gère les actions de l'interface d'administration.
- `Controller_aide.php` : Gère les actions de la page d'aide.
- `Controller_ajoutLogement.php` : Gère les actions pour ajouter un logement.
- `Controller_connexion.php` : Gère les actions de connexion.
- `Controller_deconnexion.php` : Gère les actions de déconnexion.
- `Controller_inscription.php` : Gère les actions d'inscription.
- `Controller_mdp_oublie.php` : Gère les actions de récupération de mot de passe.
- `Controller_pagelogement.php` : Gère les actions de la page de recherche de logements.

### 4. Models
Ce répertoire contient les modèles qui interagissent avec la base de données.

- `Model.php` : Contient les méthodes pour interagir avec la base de données.

### 5. Utils
Ce répertoire contient des fichiers utilitaires et de configuration.

- `config.php` : Fichier de configuration pour la base de données.
- `functions.php` : Contient des fonctions utilitaires.
- `documentation/` : Contient la documentation du projet.

### 6. Views
Ce répertoire contient les vues qui sont affichées à l'utilisateur.

- `Layout/` : Contient les fichiers de mise en page commune (en-tête et pied de page).
- `view_accueil.php` : Vue de la page d'accueil.
- `view_admin.php` : Vue de l'interface d'administration.
- `view_aide.php` : Vue de la page d'aide.
- `view_ajoutLogement.php` : Vue pour ajouter un logement.
- `view_annonces.php` : Vue des annonces de logements.
- `view_connexion.php` : Vue de la page de connexion.
- `view_inscription.php` : Vue de la page d'inscription.
- `view_mdp_oublie.php` : Vue de la page de récupération de mot de passe.
- `view_pagelogement.php` : Vue de la page de recherche de logements.

### 7. docker
Ce répertoire contient les fichiers de configuration pour Docker.

- `nginx.conf` : Configuration du serveur Nginx.

Les informations qui sont dans `nginx.conf` ont été générées par [Garage ISEP](https://github.com/Garage-ISEP) afin de deployer automatiquement à chaque push sur la branche principale.

### 8. index.php
Le point d'entrée principal de l'application. Il initialise l'application et appelle le contrôleur approprié en fonction des paramètres de l'URL.

### 9. README.md
Fichier de documentation contenant des informations sur le projet et des instructions pour les développeurs.

## Conclusion
Cette documentation fournit une vue d'ensemble de l'architecture du projet AidAppart. Chaque composant joue un rôle crucial dans le fonctionnement global de l'application, permettant une gestion efficace des logements pour les étudiants.
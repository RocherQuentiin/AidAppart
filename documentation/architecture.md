# Documentation de l'Architecture du Projet AidAppart

## Introduction
Ce document décrit l'architecture du projet AidAppart, un système de gestion de logements. Il couvre les principaux composants du projet, leur organisation et leurs interactions.

## Structure du Projet
Le projet est organisé en plusieurs répertoires principaux :

- **BD/** : Contient les scripts SQL pour la création et l'initialisation de la base de données.
- **Model/** : Contient les classes PHP pour l'accès aux données et la logique métier.
- **Vue/** : Contient les fichiers HTML, CSS et JavaScript pour l'interface utilisateur.
- **tests/** : Contient les tests unitaires pour vérifier le bon fonctionnement des composants du projet.

## Base de Données
La base de données est définie dans le fichier `BD/baseDeDonnees.sql`. Elle comprend les tables suivantes :

- **Personne** : Stocke les informations des utilisateurs.
- **Adresse** : Stocke les adresses des logements.
- **Logement** : Stocke les informations des logements.
- **Messagerie** : Stocke les messages échangés entre les utilisateurs.
- **Maison** : Stocke les informations spécifiques aux maisons.
- **Appartement** : Stocke les informations spécifiques aux appartements.
- **Avis** : Stocke les avis des utilisateurs sur les logements.
- **Annonce** : Stocke les annonces de logements.
- **Favoris_Signalement** : Stocke les favoris et signalements des utilisateurs.
- **Candidature** : Stocke les candidatures des utilisateurs pour les annonces.
- **Garent** : Stocke les informations des garants pour les logements.

## Modèle
Le répertoire `Model/` contient les classes PHP pour l'accès aux données et la logique métier. Les principales classes sont :

- **Crud.php** : Fournit des méthodes génériques pour effectuer des opérations CRUD (Create, Read, Update, Delete) sur la base de données.
TODO faire la mise à jour des données.
- **config.php** : Contient les informations de configuration pour la connexion à la base de données.

## Vue
Le répertoire `Vue/` contient les fichiers HTML, CSS et JavaScript pour l'interface utilisateur. Les principaux fichiers sont :

- **index.html** : La page d'accueil du projet.
- **index.css** : Les styles CSS pour l'interface utilisateur.
- **exemple.php** : Un exemple de script PHP pour tester les fonctionnalités du projet.

## Tests
Le répertoire `tests/` contient les tests unitaires pour vérifier le bon fonctionnement des composants du projet. Les principaux fichiers sont :

- **CrudTest.php** : Contient les tests unitaires pour la classe `Crud`.

## Conclusion
Cette documentation fournit une vue d'ensemble de l'architecture du projet AidAppart. Pour plus de détails sur chaque composant, veuillez consulter les fichiers source correspondants.

# AidAppart

# Petit Tuto sur l'Utilisation de Git

## Introduction
Git est un système de contrôle de version distribué qui permet de suivre les modifications apportées aux fichiers et de travailler en collaboration avec d'autres développeurs.

## Installation
Pour installer Git, suivez les instructions sur le [site officiel de Git](https://git-scm.com/).

## Tortoise Git
Vous pouvez aussi utiliser cette outil qui évite de passer par les lignes de commandes et qui est 
directement accessible avec le clique droit [tortoise git](https://tortoisegit.org/)

## Configuration Initiale
Après l'installation, configurez votre nom d'utilisateur et votre adresse e-mail :
```bash
git config --global user.name "Votre Nom"
git config --global user.email "votre.email@example.com"
```

## Commandes de Base

### Initialiser un Dépôt
Pour créer un nouveau dépôt Git, utilisez la commande suivante :
```bash
git init
```

### Cloner un Dépôt
Pour cloner un dépôt existant, utilisez :
```bash
git clone https://github.com/RocherQuentiin/AidAppart.git
```

### Vérifier l'État des Fichiers
Pour vérifier l'état des fichiers dans votre dépôt, utilisez :
```bash
git status
```

### Ajouter des Fichiers
Pour ajouter des fichiers à l'index (staging area), utilisez :
```bash
git add nom_du_fichier
```

### Valider des Modifications
Pour valider (commit) les modifications ajoutées à l'index, utilisez :
```bash
git commit -m "Message de validation"
```

### Pousser des Modifications
Pour pousser les modifications vers un dépôt distant, utilisez :
```bash
git push origin branche
```

### Récupérer des Modifications
Pour récupérer les modifications depuis un dépôt distant, utilisez :
```bash
git pull origin branche
```

## Conclusion
Avant de pousser vos modifications, il est important de récupérer les dernières modifications du dépôt distant en utilisant `git pull`. Cela permet d'éviter les conflits et de s'assurer que vous travaillez avec la version la plus récente du code.
Ce tutoriel couvre les commandes de base de Git. Pour plus de détails, consultez la [documentation officielle de Git](https://git-scm.com/doc).
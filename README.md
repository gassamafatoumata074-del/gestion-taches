# Application web de gestion de tâches

## Présentation

Cette application web permet de gérer une liste de tâches. Elle permet notamment de créer, consulter, modifier, terminer et supprimer des tâches.

L'application a été développée avec **Laravel** et utilise **SQLite** comme système de gestion de base de données.

## Technologies utilisées

* PHP
* Laravel
* SQLite
* Composer
* PHPUnit
* Git
* GitHub
* HTML / CSS
* JavaScript

## Prérequis

Pour installer et exécuter l'application, il est nécessaire de disposer de :

* PHP
* Composer
* SQLite
* Git

## Installation du projet

### 1. Récupérer le projet

Cloner le dépôt GitHub :

```bash
git clone https://github.com/gassamafatoumata074-del/gestion-taches.git
```

Puis accéder au dossier :

```bash
cd gestion-taches
```

### 2. Installer les dépendances

Installer les dépendances PHP avec Composer :

```bash
composer install
```

### 3. Configurer l'environnement

Copier le fichier `.env.example` vers `.env` :

```bash
copy .env.example .env
```

Puis générer la clé de l'application :

```bash
php artisan key:generate
```

Le fichier `.env` contient les paramètres propres à l'environnement d'exécution. Il ne doit pas être envoyé sur GitHub.

### 4. Préparer la base de données

L'application utilise une base de données SQLite.

Les migrations permettent de créer automatiquement les tables nécessaires :

```bash
php artisan migrate
```

### 5. Nettoyer le cache

Avant de lancer l'application, il est possible de nettoyer les différents caches Laravel :

```bash
php artisan optimize:clear
```

### 6. Lancer l'application

Démarrer le serveur de développement Laravel :

```bash
php artisan serve
```

L'application est alors accessible à l'adresse :

```text
http://127.0.0.1:8000
```

## Tests

Les tests automatisés peuvent être exécutés avec la commande :

```bash
php artisan test
```

La suite de tests vérifie notamment :

* l'accès aux pages de l'application ;
* la création d'une tâche ;
* la validation des données ;
* la modification d'une tâche ;
* la finalisation d'une tâche ;
* la suppression d'une tâche ;
* l'enregistrement des données dans la base SQLite.

## Déploiement

Le projet est versionné avec Git et hébergé sur GitHub.

Les principales étapes de préparation du déploiement sont :

1. Vérification du fonctionnement de l'application ;
2. Exécution des tests automatisés ;
3. Initialisation du dépôt Git ;
4. Création d'un commit ;
5. Envoi du projet vers GitHub ;
6. Installation des dépendances avec Composer sur l'environnement cible ;
7. Configuration du fichier `.env` ;
8. Préparation de la base de données avec les migrations ;
9. Nettoyage du cache Laravel ;
10. Vérification du fonctionnement de l'application.

## Commandes principales

```bash
composer install
php artisan key:generate
php artisan migrate
php artisan optimize:clear
php artisan test
php artisan serve
```

## Versionnement

Git est utilisé pour suivre les modifications du projet. GitHub permet de centraliser le code source et de conserver les différentes versions de l'application.

## Auteur

**Gassama Fatoumata**

Projet réalisé dans le cadre de la formation en conception et développement d'applications.

# Gestion d'un Cinéma - Projet PHP & MySQL

## Description du Projet
Ce projet consiste à développer un site web permettant de gérer un cinéma en interagissant avec une base de données MySQL. L'objectif principal est de se concentrer sur le développement backend en PHP et la gestion des données via MySQL. L'aspect visuel du site n'est pas prioritaire.

## Fonctionnalités Principales
Le site permet de réaliser les actions suivantes :

### Gestion des Films
- Rechercher des films par **nom**.
- Filtrer les films par **genre** ou **distributeur**.
- Rechercher les films projetés à une date donnée (ex : "Quels films passent ce soir ?").
- Ajouter une **séance** pour un film.

### Gestion des Abonnés
- Rechercher un membre par **nom et/ou prénom**.
- Ajouter, modifier ou supprimer un **abonnement** d'un client.
- Afficher l'**historique** des films vus par un abonné.
- Ajouter une entrée à l'historique d'un abonné (film vu aujourd'hui).

### Pagination
- Toutes les pages listant des éléments (films, abonnés, etc.) doivent permettre de choisir le **nombre de résultats affichés** et inclure un système de **pagination**.

## Base de Données
- Le projet repose sur une base de données MySQL fournie au départ.
- Toute modification de la structure doit respecter les contraintes minimales mentionnées ci-dessus.
- Les améliorations telles que les **collations, clés étrangères, et relations entre tables** sont fortement recommandées.
- Si de nouvelles fonctionnalités sont ajoutées, la création de nouvelles tables peut être nécessaire.


## Installation
1. Cloner ce répertoire sur votre machine locale :
   ```sh
   git clone https://github.com/votre-repo.git
   ```
2. Importer la base de données MySQL fournie via phpMyAdmin ou en ligne de commande :
   ```sh
   mysql -u root -p < cinema.sql
   ```
3. Configurer la connexion à la base de données dans `connect.php` :
   ```php
   $host = 'localhost';
   $dbname = 'cinema';
   $user = 'root';
   $password = '';
   ```
4. Démarrer le serveur local et accéder au site via `http://localhost/cinema`.

## Améliorations Possibles
- Ajout d'un système d'authentification pour les employés.
- Mise en place d'une interface plus ergonomique avec un framework CSS.
- Ajout d'un système de réservation en ligne.
- Intégration d'un système de paiement pour les abonnements.

## Auteurs
- Massé BATEKE



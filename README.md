# Gestion des Fiches de Correction

## Description
Cette application web PHP permet de gérer les fiches de correction des professeurs. Elle offre les fonctionnalités suivantes :
- Ajout de nouvelles fiches de correction
- Modification des fiches existantes
- Suppression des fiches
- Liste des fiches de correction

## Structure du Projet

### Dossier `controllers`
Contient les contrôleurs PHP qui gèrent la logique métier :
- `delete.php` : Gestion de la suppression des fiches
- `insertion.php` : Insertion des nouvelles fiches
- `recupList.php` : Récupération des données pour l'affichage
- `traitement.php` : Traitement des formulaires
- `Update.php` : Mise à jour des fiches

### Dossier `include`
Contient les fichiers communs :
- `header.php` : En-tête de la page avec le menu de navigation

### Dossier `views`
Contient les vues HTML :
- `form_ajout.php` : Formulaire d'ajout de fiche
- `form_update.php` : Formulaire de modification
- `Lister.php` : Page de liste des fiches

### Dossier `config`
Contient la configuration de la base de données :
- `connect_bd.php` : Configuration de connexion à la base de données

## Fonctionnalités

### Formulaire d'Ajout
- Saisie des informations du professeur (nom, prénom, grade)
- Sélection de l'établissement
- Informations sur l'examen et l'épreuve
- Date de correction et nombre de copies

### Liste des Fiches
- Affichage des informations complètes
- Boutons de modification et suppression
- Messages de succès en session

### Modification
- Pré-remplissage des champs
- Validation des données
- Mise à jour dans plusieurs tables

### Suppression
- Confirmation avant suppression
- Suppression en cascade
- Gestion des transactions

## Caractéristiques Techniques

### Sécurité
- Nettoyage des données (htmlspecialchars)
- Préparation des requêtes SQL
- Sessions pour les messages
- Validation des formulaires

### Interface Utilisateur
- Bootstrap 5 pour le design
- Messages de succès avec icônes
- Validation en temps réel
- Confirmation avant suppression

### Base de Données
- Utilisation de PDO
- Transactions pour l'intégrité des données
- Jointures entre les tables
- Gestion des clés étrangères

## Installation

1. Copier le dossier du projet dans votre serveur web
2. Configurer la base de données dans `config/connect_bd.php`
3. Créer la base de données avec les tables nécessaires
4. Accéder à l'application via votre navigateur

## Technologies Utilisées
- PHP 8+
- MySQL/MariaDB
- Bootstrap 5
- jQuery
- Font Awesome

## Notes
- Les messages de succès sont stockés en session
- Les liens utilisent des chemins absolus basés sur la racine
- La navigation est sécurisée avec des vérifications de paramètres
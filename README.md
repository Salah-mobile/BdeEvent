#  BDE-Events

**BDE-Events** est une plateforme web permettant au Bureau des Étudiants (BDE) de gérer les événements du campus et aux étudiants de réserver leur place en ligne, consulter leurs billets numériques et participer facilement aux activités organisées.

---

#  Fonctionnalités

##  Administrateur (BDE)

* Authentification sécurisée.
* Création d'un événement.
* Modification d'un événement.
* Suppression d'un événement.
* Consultation du tableau de bord.
* Suivi du nombre de réservations.
* Visualisation des places restantes.

##  Étudiant

* Authentification.
* Consulter la liste des événements.
* Réserver une place.
* Empêcher les doubles réservations.
* Consulter "Mes Billets".
* Génération automatique d'un ticket unique.


#  Technologies utilisées

* Laravel 
* PHP 
* MySQL
* Blade
* Tailwind CSS
* Git & GitHub

---

#  Structure de la base de données

Les principales tables :

* users
* roles
* events
* reservations
* tickets

---

#  Diagrammes

## Use Case Diagram

[class](docs/useCase.png)

---

## Class Diagram

[Class Diagram](docs/class1.png)

---

## ERD (Entity Relationship Diagram)

[ERD](docs/erd.png)

---

#  Comptes de test

## Administrateur

Email :

```
admin@bde.com
```

Mot de passe :

```
password123
```
---

## Étudiant

Email :

```
student@bde.com
```

Mot de passe :

```
student123
```

---

#  Gestion des rôles

Le projet utilise deux rôles :

* Admin
* Student

L'accès est contrôlé grâce aux middlewares :

* auth
* admin
* student


#  Fonctionnement

1. L'utilisateur se connecte.
2. Le système détecte son rôle.
3. L'administrateur gère les événements.
4. L'étudiant consulte les événements.
5. L'étudiant réserve une place.
6. Un ticket unique est généré automatiquement.


#  User Stories réalisées

## Épic 1

*  Création d'événement
*  Modification d'événement
*  Suppression d'événement
*  Tableau de bord Admin

## Épic 2

*  Réservation d'une place
*  Vérification des places disponibles
*  Interdiction de réserver deux fois

## Épic 3

*  Génération automatique d'un ticket
*  Consultation des billets

---

#  Auteur

**Salah Eddine Tabit**


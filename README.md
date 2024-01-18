# Système de Gestion de Pharmacie

## Contexte du Projet

Le projet de Système de Gestion de Pharmacie a pour objectif de créer une application robuste et modulaire pour gérer efficacement les opérations quotidiennes d'une pharmacie. L'application permettra aux administrateurs et aux patients d'interagir de manière spécifique à leurs besoins.

## Fonctionnalités Clés

### Gestion Administrative

- CRUD des administrateurs, des patients, des médicaments et des ventes.
- Génération de rapports détaillés sur les ventes.
- Authentification sécurisée pour les administrateurs.

### Interface Patient

- Consultation des médicaments disponibles.
- Possibilité de faire une demande pour un médicament spécifique.
- Suivi des ventes et exportation des bons de vente.

## Notes et Recommandations

- **Demande de Médicament** : Pour faire une demande, le patient doit effectuer une vente pour un médicament. Dans la classe Vente, ajoutez une propriété de type Medicament pour contenir le médicament choisi lors de la vente.

- **Authentification** : Utilisez une interface (Authenticatable) pour gérer l'authentification. Seuls Admin et PatientEnLigne peuvent avoir un email et un mot de passe, et ils doivent implémenter cette interface.

- **Héritages** :
  - **Utilisateurs** : Admin et Patient héritent de la classe de base User.
  - **Ventes** : VenteEnLigne et VenteEnMagasin héritent de la classe Vente, permettant de modéliser différentes méthodes de vente dans le système.
  - **Patients** : PatientEnLigne et PatientEnMagasin héritent de la classe Patient, distinguant les patients en ligne et en magasin tout en partageant des caractéristiques communes.
  - **Rapports** : RapportVente et RapportStock héritent de la classe Rapport, offrant ainsi une manière organisée de générer des rapports spécifiques.

- **Structure d'Entrée (public/index.php)** :
  - **Autoload de Composer PSR-4** : Assurez le chargement automatique des classes avec l'autoloader de Composer.
  - **Démarrage de la Session** : Initiez la session du projet au début du script.
  - **Utilisation de ob_start() et ob_get_clean()** : Encapsulez le code avec ob_start() et ob_get_clean() pour éviter les problèmes liés à une sortie incorrecte et pour résoudre les problèmes liés aux en-têtes de localisation (Location Header).
  - **Gestion des Routes** : Ajoutez une classe de routage avec des méthodes pour gérer les requêtes HTTP (GET et POST). Intégrez une fonction privée (resolver) pour résoudre le contrôleur et l'action en fonction de l'URL demandée.
  - **Connexion à la Base de Données avec Singleton** : Implémentez une classe Database pour la connexion à la base de données en utilisant PDO. Assurez une seule instance de cette classe dans tout le projet en appliquant le design pattern Singleton.

🛠 CustomerCareAPI - API de Gestion des Tickets d’Assistance Client

📖 Présentation

CustomerCareAPI est une API REST conçue avec Laravel pour faciliter la gestion des tickets d’assistance client. Elle offre aux entreprises un moyen efficace d’organiser les demandes de support, d’assigner des tickets aux agents et de suivre leur évolution.

Cette API repose sur des principes de sécurité, d’évolutivité et de robustesse, garantissant ainsi une solution performante pour la gestion du support client.

📌 Fonctionnalités principales

🎫 Gestion des tickets

Création, mise à jour et clôture des tickets.

Attribution de catégories et niveaux de priorité.

Liaison des tickets avec clients et agents.

👨‍💼 Attribution des demandes aux agents

Assignation automatique ou manuelle des tickets.

Notifications envoyées aux agents concernés.

Répartition optimisée des charges de travail.

📊 Suivi des requêtes

États des tickets : ouvert, en cours, résolu, fermé.

Historique détaillé des modifications et actions effectuées.

Surveillance des temps de réponse et délais de résolution.

📝 Enregistrement des interactions

Stockage des messages et réponses liés aux tickets.

Suivi des interventions des agents et des clients.

Génération de rapports et statistiques sur l’activité du support.

🛠️ Technologies et bonnes pratiques

Laravel et Eloquent ORM pour une gestion fluide des données.

Laravel Sanctum pour l’authentification sécurisée.

Swagger (OpenAPI) pour documenter l’API de manière interactive.

Tests automatisés avec PHPUnit pour assurer la fiabilité du système.

Implémentation des principes SOLID et architecture RESTful.

🚀 Installation et configuration

1️⃣ Cloner le projet

git clone https://github.com/Youcode-Classe-E-2024-2025/tawba-zehaf-CustomerCareAPI-.git

2️⃣ Installer les dépendances

composer install

3️⃣ Configurer l’environnement

Copier .env.example en .env et renseigner les informations de connexion à la base de données (PostgreSQL).

4️⃣ Générer la clé d’application

php artisan key:generate

5️⃣ Exécuter les migrations et insérer des données initiales

php artisan migrate --seed

6️⃣ Générer la documentation Swagger

php artisan l5-swagger:generate

7️⃣ Démarrer le serveur

php artisan serve

L’API est maintenant accessible via http://127.0.0.1:8000 🎉

🌐 Utilisation de l’API

Cette API est conçue pour être consommée par des frameworks JavaScript modernes comme React via Fetch API ou Axios. La documentation Swagger, disponible à /api/documentation, facilite son intégration.

📢 Contribution

Vous souhaitez améliorer CustomerCareAPI ? Suivez ces étapes :

Forkez le projet.

Créez une nouvelle branche :

git checkout -b feature/amélioration

Apportez vos modifications et committez-les :

git commit -m "Ajout d’une nouvelle fonctionnalité"

Poussez la branche sur le dépôt :

git push origin feature/amélioration

Ouvrez une Pull Request.
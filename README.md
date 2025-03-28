🚀 CustomerCareAPI - Gestion des Tickets d'Assistance Client

📖 Aperçu

CustomerCareAPI est une API REST puissante développée avec Laravel, conçue pour optimiser la gestion des tickets d'assistance client. Elle simplifie la gestion des demandes, permet d'assigner efficacement les tickets aux agents et assure un suivi transparent des requêtes.

Pensée pour être sécurisée, modulable et performante, cette API suit les meilleures pratiques de développement.

🎯 Fonctionnalités Clés

🎫 Gestion des Tickets

Création, modification et fermeture de tickets.

Classification des tickets par catégories et priorités.

Liaison des tickets avec des clients et des agents.

👨‍💼 Attribution aux Agents

Assignation automatique ou manuelle des tickets.

Notifications en temps réel pour les agents concernés.

Répartition intelligente de la charge de travail.

📊 Suivi et Historique

Statuts disponibles : ouvert, en cours, résolu, fermé.

Historique complet des modifications et interactions.

Suivi des délais de réponse et de résolution.

📝 Enregistrement des Échanges

Conservation des messages et réponses aux tickets.

Suivi des actions effectuées par clients et agents.

Génération de statistiques et de rapports d'activité.

🛠️ Technologies Employées

Laravel & Eloquent ORM pour une gestion efficace des données.

Laravel Sanctum pour l'authentification et les permissions.

Swagger (OpenAPI) pour une documentation interactive.

Tests automatisés avec PHPUnit pour assurer la fiabilité.

Architecture RESTful respectant les principes SOLID.

🔧 Installation et Configuration

1️⃣ Cloner le dépôt

git clone https://github.com/Youcode-Classe-E-2024-2025/tawba-zehaf-CustomerCareAPI-.git

2️⃣ Installer les dépendances

composer install

3️⃣ Configurer l'environnement

Copier .env.example en .env et renseigner les paramètres de la base de données (PostgreSQL).

4️⃣ Générer la clé d'application

php artisan key:generate

5️⃣ Exécuter les migrations et insérer les données de départ

php artisan migrate --seed

6️⃣ Générer la documentation Swagger

php artisan l5-swagger:generate

7️⃣ Lancer le serveur

php artisan serve

L'API sera accessible à l'adresse http://127.0.0.1:8000 🎉

🌐 Consommation de l'API

CustomerCareAPI est conçue pour être utilisée avec des frameworks JavaScript modernes tels que React (via Fetch API ou Axios). La documentation Swagger disponible à /api/documentation facilite son intégration.

🤝 Contribuer

Les contributions sont les bienvenues ! Pour proposer des améliorations :

Forkez le projet.

Créez une nouvelle branche :

git checkout -b feature/amélioration

Effectuez vos modifications et committez-les :

git commit -m "Ajout d’une nouvelle fonctionnalité"

Poussez la branche :

git push origin feature/amélioration

Ouvrez une Pull Request.


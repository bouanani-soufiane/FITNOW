# Développement d'une API REST pour le suivi de condition physique, permettant à chaque utilisateur abonné de gérer ses propres progrès physiques.

# Features

- **Authentification des utilisateurs** : Système d'authentification sécurisé pour l'enregistrement et la connexion des utilisateurs.
- **Gestion de la progression** : Opérations CRUD pour la gestion des progressions de la condition physique.
- **Points d'accès à l'API** : Points d'extrémité API bien définis pour interagir avec les ressources de l'application.
- **Tests** : Suite complète de tests pour garantir la fiabilité et la fonctionnalité de l'API.

## Installation

### 🔗 Cloner le dépôt en utilisant cette commande :

```bash
git clone git@github.com:bouanani-soufiane/FITNOW.git
```
### Exécuter le projet :

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```
### Ajouter le fichier .env :

```bash
cp .env.example .env
```
### Générer la clé d'application :

```bash
./vendor/bin/sail artisan key:generate
```
### Exécuter les migrations :

```bash
./vendor/bin/sail artisan migrate
```
### Testing :

```bash
./vendor/bin/sail artisan test
```

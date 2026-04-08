# Tom-Troc 📚

Tom-Troc est une plateforme d'échange de livres entre particuliers, développée en PHP avec une architecture MVC.

---

## Prérequis

- Serveur local : MAMP, WAMP ou LAMP
- PHP 8.3+
- MySQL 8.0+

---

## Installation

1. **Cloner le projet**
```bash
   git clone https://github.com/Farid83300/Tom-Troc.git
```

2. **Placer le projet** dans le dossier racine de votre serveur local (`htdocs`, `www`, etc.)

3. **Créer la base de données**
   - Ouvrez phpMyAdmin
   - Créez une base de données vide nommée `tom-troc`
   - Importez le fichier `tom-troc.sql`

4. **Configurer la connexion**
   - Ouvrez `config/config.php`
   - Renseignez vos identifiants de base de données :
```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'tom-troc');
   define('DB_USER', 'root');
   define('DB_PASS', '');
```

5. **Lancer le projet**
   - Pointez votre navigateur vers `index.php`

---

## Compte de démonstration

Un compte évaluateur est disponible avec des livres et des conversations pré-configurés :

| Champ | Valeur |
|---|---|
| Email | evaluateur@tomtroc.fr |
| Mot de passe | Demo1234! |

---

## Fonctionnalités

- 📖 Catalogue de livres disponibles à l'échange
- 👤 Création de compte et authentification
- 🖼️ Gestion de profil avec photo de avatar
- 📬 Messagerie privée entre membres avec badges de messages non lus
- 🔍 Recherche de livres
- ✏️ Ajout et modification de livres

---

## Stack technique

- **Back-end** : PHP 8.3 — Architecture MVC
- **Base de données** : MySQL 8.0 — PDO
- **Front-end** : HTML5, CSS3, JavaScript
- **Serveur local** : MAMP

---

## Structure du projet
```
tom-troc/
├── assets/          # CSS, JS, images
├── config/          # Configuration et autoload
├── controllers/     # Contrôleurs MVC
├── models/          # Modèles et accès BDD
├── views/           # Templates et vues
├── index.php        # Point d'entrée unique
└── tom-troc.sql     # Export de la base de données
```

---

## Problèmes courants

- **Page blanche** : vérifiez les identifiants dans `config/config.php`
- **Erreur PDO** : assurez-vous que votre serveur MySQL est bien démarré
- **Images manquantes** : vérifiez que le dossier `assets/img/` est bien présent

---

## Contexte

Projet réalisé dans le cadre de la formation **Développeur d'application Full-Stack** chez OpenClassrooms.
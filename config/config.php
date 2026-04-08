<?php

declare(strict_types=1);

// Démarrage de la session pour gérer les connexions utilisateur
session_start();

// Chemins des vues
define('TEMPLATE_VIEW_PATH', './views/templates/');
define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php');

// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'tom-troc');
define('DB_USER', 'root');
define('DB_PASS', 'root');

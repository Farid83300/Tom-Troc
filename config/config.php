<?php

// Démarre la session pour gérer l'authentification
// et les messages flash sur toutes les pages.
session_start();

// Chemins absolus, indépendants du point d'entrée
define('ROOT_PATH', dirname(__DIR__) . '/');
define('TEMPLATE_VIEW_PATH', ROOT_PATH . 'views/templates/');
define('MAIN_VIEW_PATH', ROOT_PATH . 'views/templates/main.php');

// === PARAMÈTRES DE CONNEXION À LA BDD ===
define('DB_HOST', 'localhost');
define('DB_NAME', 'tom-troc');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// === CONNEXION À LA BDD AVEC PDO ===
try {
    $db = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        [
            // Lève des exceptions en cas d'erreur SQL
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {

    die('Erreur de connexion à la base de données : ' . $e->getMessage());

}
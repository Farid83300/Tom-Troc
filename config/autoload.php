<?php

spl_autoload_register(function ($class) {
    // Les dossiers où chercher les classes
    $paths = [
        __DIR__ . '/../controllers/' . $class . '.php',
        __DIR__ . '/../models/' . $class . '.php',
    ];

    // On parcourt chaque chemin possible
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return; // Fichier trouvé, on arrête la recherche
        }
    }
});
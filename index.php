<?php
/**
 * Point d'entrée unique de l'application.
*/

require_once 'config/autoload.php';
require_once 'config/config.php';
require_once 'views/views.php';

// on affiche la page d'accueil par défaut.
$action = $_GET['action'] ?? 'home';

// Routeur : on dirige vers le bon contrôleur selon l'action
switch ($action) {
    case 'home':
        $controller = new HomeController();
        $controller->showHome();
        break;

    case 'book':
        $controller = new BookController();
        $controller->showBooks();
        break;

    case 'single-book':
        $controller = new BookController();
        $controller->showSingleBook();
        break;

    case 'edit-book':
        $controller = new BookController();
        $controller->showEditBook();
        break;

    case 'account':
        $controller = new AccountController();
        $controller->showAccount();
        break;

    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;

    case 'registration':
        $controller = new AuthController();
        $controller->showRegistration();
        break;

    case 'messenger':
        $controller = new MessengerController();
        $controller->showMessenger();
        break;

    default:
        http_response_code(404);
        render('error404', ['title' => 'Page non trouvée']);
        break;
}
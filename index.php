<?php
declare(strict_types=1);
/**
 * Point d'entrée unique de l'application.
*/

require_once 'config/autoload.php';
require_once 'config/config.php';
require_once 'views/views.php';

// on affiche la page d'accueil par défaut.
$action = $_GET['action'] ?? 'home';

// Try catch global pour gérer les erreurs
try {
// Routeur : on dirige vers le bon contrôleur selon l'action
    switch ($action) {
        case 'home':
            $controller = new HomeController();
            $controller->showHome();
            break;

        case 'books':
            $controller = new BookController();
            $controller->showBooks();
            break;

        case 'single-book':
            $controller = new BookController();
            $controller->showSingleBook();
            break;

        case 'edit-book':
            $controller = new BookController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->updateBook();
            } else {
                $controller->showEditBook();
            }
            break;

        case 'account':
            $controller = new AccountController();
            $controller->showAccount();
            break;

        case 'public-account':
            $controller = new AccountController();
            $controller->showPublicAccount();
            break;

        case 'login':
            $controller = new AuthController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->login();
            } else {
                $controller->showLogin();
            }
            break;

        case 'registration':
            $controller = new AuthController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->register();
            } else {
                $controller->showRegistration();
            }
            break;

        case 'messenger':
            $controller = new MessengerController();
            $controller->showMessenger();
            break;

        case 'logout':
            $controller = new AuthController();
            $controller->logout();
            break;

        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
<?php

declare(strict_types=1);

class HomeController
{
    // Affiche la page d'accueil avec les derniers livres ajoutés
    public function showHome(): void
    {
        $db = DBManager::getInstance()->getPDO();
        $bookManager = new BookManager($db);
        $lastBooks = $bookManager->getLastBooks();

        $view = new View('Accueil');
        $view->render('home', ['lastBooks' => $lastBooks]);
    }
}
<?php
declare(strict_types=1);

class HomeController
{
    public function showHome(): void
    {
        $db = DBManager::getInstance()->getPDO();
        $bookManager = new BookManager($db);
        $lastBooks = $bookManager->getLastBooks();

        $view = new View('Accueil');
        $view->render('home', ['lastBooks' => $lastBooks]);
    }
}
<?php
declare(strict_types=1);

require_once __DIR__ . '/../views/views.php';

class HomeController
{
    public function showHome(): void
    {
        $view = new View('Accueil');
        $view->render('home');
    }
}
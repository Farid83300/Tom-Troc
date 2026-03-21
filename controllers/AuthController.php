<?php
declare(strict_types=1);

class AuthController
{
    public function showLogin(): void
    {
        $view = new View('Connexion');
        $view->render('login');
    }

    public function showRegistration(): void
    {
        $view = new View('Inscription');
        $view->render('registration');
    }
}
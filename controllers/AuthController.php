<?php
declare(strict_types=1);

class AuthController
{
    // Affiche le formulaire de connexion
    public function showLogin(): void
    {
        $view = new View('Connexion');
        $view->render('login');
    }
    //
    public function showRegistration(): void
    {
        $view = new View('Inscription');
        $view->render('registration');
    }
}
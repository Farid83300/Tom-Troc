<?php
declare(strict_types=1);

class AccountController
{
    public function showAccount(): void
    {
        $view = new View('Mon compte');
        $view->render('account');
    }

        public function showPublicAccount(): void
    {
        $view = new View('Profil public');
        $view->render('public-account');
    }
}
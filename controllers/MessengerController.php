<?php
declare(strict_types=1);

class MessengerController
{
    // Affiche la page de messagerie (fonctionnalité à implémenter)
    public function showMessenger(): void
    {
        $view = new View('Messagerie');
        $view->render('messenger');
    }
}
<?php
declare(strict_types=1);

class MessengerController
{
    public function showMessenger(): void
    {
        $view = new View('Messagerie');
        $view->render('messenger');
    }
}
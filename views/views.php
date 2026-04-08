<?php

declare(strict_types=1);

class View
{
    //
    private string $title;
    // Le nom de la page courante, utilisé pour le menu actif et le CSS spécifique
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function render(string $template, array $data = []): void
    {
        // Badge messagerie dynamique — disponible sur toutes les pages
        if (isset($_SESSION['user'])) {
            $db = DBManager::getInstance()->getPDO();
            $messageManager = new MessageManager($db);
            $data['unreadCount'] = $messageManager->countUnread($_SESSION['user']['id']);
        } else {
            $data['unreadCount'] = 0;
        }

        // On rend les données accessibles dans la vue
        extract($data);

        // On rend le titre accessible dans main.php
        $title = $this->title;

        // On capture le contenu spécifique de la page
        ob_start();
        require __DIR__ . '/templates/' . $template . '.php';
        $content = ob_get_clean();

        // On injecte le tout dans le layout principal
        require __DIR__ . '/templates/main.php';
    }
}

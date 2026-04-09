<?php

declare(strict_types=1);

class MessengerController
{
    private MessageManager $messageManager;
    private UserManager $userManager;

    public function __construct()
    {
        $db = DBManager::getInstance()->getPDO();
        $this->messageManager = new MessageManager($db);
        $this->userManager    = new UserManager($db);
    }

    // Vérifie que l'utilisateur est connecté
    private function requireAuth(): void
    {
        if (empty($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit;
        }
    }

    // Boîte de réception — liste des conversations
    public function showMessenger(): void
    {
        $this->requireAuth();

        $currentUserId = $_SESSION['user']['id'];

        // Si on a un interlocuteur en GET, on affiche la conversation
        $withUserId = isset($_GET['with']) ? (int) $_GET['with'] : null;
        $messages   = [];
        $withUser   = null;

        if ($withUserId) {
            // Empêche de discuter avec soi-même
            if ($withUserId === $currentUserId) {
                header('Location: index.php?action=messenger');
                exit;
            }

            $messages = $this->messageManager->getMessagesBetween($currentUserId, $withUserId);
            $this->messageManager->markAsRead($withUserId, $currentUserId);
            $withUser = $this->userManager->getUserById($withUserId);
        }

        $conversations = $this->messageManager->getConversationsByUser($currentUserId);

        $view = new View('Messagerie');
        $view->render('messenger', [
            'conversations' => $conversations,
            'messages'      => $messages,
            'withUser'      => $withUser,
            'currentUserId' => $currentUserId,
        ]);
    }

    // Envoi d'un message (POST)
    public function sendMessage(): void
    {
        $this->requireAuth();

        $currentUserId = $_SESSION['user']['id'];
        $receiverId    = isset($_POST['receiver_id']) ? (int) $_POST['receiver_id'] : 0;
        $content       = trim($_POST['content'] ?? '');

        // Empêche de s'envoyer un message à soi-même
        if ($receiverId === $currentUserId) {
            header('Location: index.php?action=messenger');
            exit;
        }

        if ($receiverId > 0 && $content !== '') {
            $this->messageManager->sendMessage($currentUserId, $receiverId, $content);
        }

        header("Location: index.php?action=messenger&with={$receiverId}");
        exit;
    }
}

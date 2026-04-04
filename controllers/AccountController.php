<?php
declare(strict_types=1);

class AccountController
{
    public function showAccount(): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $db = DBManager::getInstance()->getPDO();
        $userManager = new UserManager($db);
        $bookManager = new BookManager($db);

        $userId = $_SESSION['user']['id'];
        $user = $userManager->getUserByEmail($_SESSION['user']['email']);
        $books = $bookManager->getBooksByUserId($userId);
        $bookCount = $bookManager->countBooksByUserId($userId);

        // Calcul de l'ancienneté
        $createdAt = new DateTime($user['created_at']);
        $now = new DateTime();
        $diff = $createdAt->diff($now);

        if ($diff->y > 0) {
            $memberSince = 'Membre depuis ' . $diff->y . ' an' . ($diff->y > 1 ? 's' : '');
        } elseif ($diff->m > 0) {
            $memberSince = 'Membre depuis ' . $diff->m . ' mois';
        } else {
            $memberSince = 'Membre depuis ' . $diff->d . ' jour' . ($diff->d > 1 ? 's' : '');
        }

        $view = new View('Mon compte');
        $view->render('account', [
            'user' => $user,
            'books' => $books,
            'bookCount' => $bookCount,
            'memberSince' => $memberSince,
        ]);
    }

    public function updateAvatar(): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit;
        }

        if (!isset($_FILES['avatar']) || $_FILES['avatar']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = 'Erreur lors de l\'upload de l\'image.';
            header('Location: index.php?action=account');
            exit;
        }

        $file = $_FILES['avatar'];

        // Vérification du type d'image
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        if (!in_array($file['type'], $allowedTypes)) {
            $_SESSION['error'] = 'Format d\'image non autorisé. Utilisez JPG, PNG ou WEBP.';
            header('Location: index.php?action=account');
            exit;
        }

        // Génération d'un nom unique
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = 'avatar-' . $_SESSION['user']['id'] . '-' . time() . '.' . $extension;
        $destination = 'assets/img/avatar/' . $fileName;

        // Déplacement du fichier
        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            $_SESSION['error'] = 'Erreur lors de la sauvegarde de l\'image.';
            header('Location: index.php?action=account');
            exit;
        }

        // Mise à jour en BDD
        $db = DBManager::getInstance()->getPDO();
        $userManager = new UserManager($db);
        $userManager->updateProfilePicture($_SESSION['user']['id'], $destination);

        // Mise à jour de la session
        $_SESSION['user']['profile_picture'] = $destination;

        header('Location: index.php?action=account');
        exit;
    }

    public function showPublicAccount(): void
    {
        $userId = (int) ($_GET['id'] ?? 0);

        $db = DBManager::getInstance()->getPDO();
        $userManager = new UserManager($db);
        $bookManager = new BookManager($db);

        $owner = $userManager->getUserById($userId);

        if (!$owner) {
            throw new Exception("Cet utilisateur n'existe pas.");
        }

        $books = $bookManager->getBooksByUserId($userId);
        $bookCount = $bookManager->countBooksByUserId($userId);

        // Calcul de l'ancienneté
        $createdAt = new DateTime($owner['created_at']);
        $now = new DateTime();
        $diff = $createdAt->diff($now);

        if ($diff->y > 0) {
            $memberSince = 'Membre depuis ' . $diff->y . ' an' . ($diff->y > 1 ? 's' : '');
        } elseif ($diff->m > 0) {
            $memberSince = 'Membre depuis ' . $diff->m . ' mois';
        } else {
            $memberSince = 'Membre depuis ' . $diff->d . ' jour' . ($diff->d > 1 ? 's' : '');
        }

        $view = new View($owner['pseudo']);
        $view->render('public-account', [
            'owner' => $owner,
            'books' => $books,
            'bookCount' => $bookCount,
            'memberSince' => $memberSince,
        ]);
    }
}
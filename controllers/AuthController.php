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

    // Traite la soumission du formulaire de connexion
    public function login(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        // Validation basique
        if (empty($email) || empty($password)) {
            $_SESSION['error'] = 'Tous les champs sont obligatoires.';
            header('Location: index.php?action=login');
            exit;
        }
        // Récupération de l'utilisateur en BDD
        $db = DBManager::getInstance()->getPDO();
        $userManager = new UserManager($db);
        $user = $userManager->getUserByEmail($email);
        // Vérification de l'utilisateur et du mot de passe
        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['error'] = 'Email ou mot de passe incorrect.';
            header('Location: index.php?action=login');
            exit;
        }
        // Connexion réussie, on stocke les infos de l'utilisateur en session
        $_SESSION['user'] = [
            'id' => $user['id'],
            'pseudo' => $user['pseudo'],
            'email' => $user['email'],
            'profile_picture' => $user['profile_picture'],
        ];
        // Redirection vers la page d'accueil
        header('Location: index.php?action=home');
        exit;
    }

    // Affiche le formulaire d'inscription
    public function showRegistration(): void
    {
        $view = new View('Inscription');
        $view->render('registration');
    }

    // Traite la soumission du formulaire d'inscription
    public function register(): void
    {
        // Récupération et validation des données du formulaire
        $pseudo = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        // Validation basique
        if (empty($pseudo) || empty($email) || empty($password)) {
            $_SESSION['error'] = 'Tous les champs sont obligatoires.';
            header('Location: index.php?action=registration');
            exit;
        }
        // Vérification de l'unicité de l'email et du pseudo
        $db = DBManager::getInstance()->getPDO();
        $userManager = new UserManager($db);
        // Vérification de l'unicité de l'email
        if ($userManager->emailExists($email)) {
            $_SESSION['error'] = 'Cet email est déjà utilisé.';
            header('Location: index.php?action=registration');
            exit;
        }
        // Vérification de l'unicité du pseudo
        if ($userManager->pseudoExists($pseudo)) {
            $_SESSION['error'] = 'Ce pseudo est déjà pris.';
            header('Location: index.php?action=registration');
            exit;
        }
        // Création de l'utilisateur en BDD
        $userManager->createUser($pseudo, $email, $password);
        // Redirection vers la page de connexion avec un message de succès
        $_SESSION['success'] = 'Inscription réussie ! Connectez-vous.';
        header('Location: index.php?action=login');
        exit;
    }

    // Traite la déconnexion de l'utilisateur
    public function logout(): void
    {
        session_destroy();
        header('Location: index.php?action=home');
        exit;
    }
}
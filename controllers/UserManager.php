<?php
declare(strict_types=1);

class UserManager
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Crée un nouvel utilisateur en BDD
    public function createUser(string $pseudo, string $email, string $password): void
    {
        $stmt = $this->db->prepare(
            'INSERT INTO user (pseudo, email, password, profile_picture, created_at) 
             VALUES (:pseudo, :email, :password, :profile_picture, NOW())'
        );
        $stmt->execute([
            ':pseudo' => $pseudo,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':profile_picture' => 'assets/img/avatar/default-avatar.png',
        ]);
    }

    // Récupère un utilisateur par son email
    public function getUserByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE email = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user ?: null;
    }

    // Vérifie si un email existe déjà
    public function emailExists(string $email): bool
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM user WHERE email = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return (int) $stmt->fetchColumn() > 0;
    }

    // Vérifie si un pseudo existe déjà
    public function pseudoExists(string $pseudo): bool
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM user WHERE pseudo = :pseudo');
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        return (int) $stmt->fetchColumn() > 0;
    }
}
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
            ':profile_picture' => 'assets/img/avatar/defaut-avatar.png',
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

    // Met à jour la photo de profil d'un utilisateur
    public function updateProfilePicture(int $userId, string $path): void
    {
        $stmt = $this->db->prepare('UPDATE user SET profile_picture = :path WHERE id = :id');
        $stmt->execute([
            ':path' => $path,
            ':id' => $userId,
        ]);
    }
    
    // Récupère un utilisateur par son ID
    public function getUserById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user ?: null;
    }

    public function updateUser(int $userId, string $pseudo, string $email, ?string $newPassword = null): void
    {
        if ($newPassword !== null) {
            $stmt = $this->db->prepare(
                'UPDATE user SET pseudo = :pseudo, email = :email, password = :password WHERE id = :id'
            );
            $stmt->execute([
                ':pseudo'   => $pseudo,
                ':email'    => $email,
                ':password' => password_hash($newPassword, PASSWORD_DEFAULT),
                ':id'       => $userId,
            ]);
        } else {
            $stmt = $this->db->prepare(
                'UPDATE user SET pseudo = :pseudo, email = :email WHERE id = :id'
            );
            $stmt->execute([
                ':pseudo' => $pseudo,
                ':email'  => $email,
                ':id'     => $userId,
            ]);
        }
    }
}

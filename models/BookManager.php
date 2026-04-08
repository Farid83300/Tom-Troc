<?php

declare(strict_types=1);

class BookManager
{
    private PDO $db;
    // Le constructeur reçoit une instance de PDO pour interagir avec la base de données
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Récupère tous les livres disponibles sur le site
    public function getAllBooks(): array
    {
        $stmt = $this->db->query(
            'SELECT book.*, user.pseudo 
             FROM book 
             LEFT JOIN user ON book.user_id = user.id
             ORDER BY book.created_at DESC'
        );
        return $stmt->fetchAll();
    }

    // Récupère les derniers livres ajoutés pour la page d'accueil
    public function getLastBooks(int $limit = 4): array
    {
        $stmt = $this->db->prepare(
            'SELECT book.*, user.pseudo 
            FROM book 
            LEFT JOIN user ON book.user_id = user.id
            ORDER BY book.created_at DESC
            LIMIT :limit'
        );
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Récupère les détails d'un livre spécifique en fonction de son ID
    public function getBookById(int $id): array
    {
        $stmt = $this->db->prepare(
            'SELECT book.*, user.pseudo, user.profile_picture 
            FROM book 
            LEFT JOIN user ON book.user_id = user.id
            WHERE book.id = :id'
        );
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $book = $stmt->fetch();

        if (!$book) {
            throw new Exception("Le livre demandé n'existe pas.");
        }

        return $book;
    }

    // Recherche des livres par titre
    public function searchBooks(string $search): array
    {
        $stmt = $this->db->prepare(
            'SELECT book.*, user.pseudo 
            FROM book 
            LEFT JOIN user ON book.user_id = user.id
            WHERE book.title LIKE :search
            ORDER BY book.created_at DESC'
        );
        $stmt->bindValue(':search', '%' . $search . '%');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Met à jour les informations d'un livre spécifique en fonction de son ID
    public function updateBook(
        int $id,
        string $title,
        string $author,
        string $description,
        int $availability,
        string $photo
    ): void {
        $stmt = $this->db->prepare(
            'UPDATE book 
                SET title = :title, author = :author, description = :description, 
                    availability = :availability, photo = :photo
                WHERE id = :id'
        );
        $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':author' => $author,
            ':description' => $description,
            ':availability' => $availability,
            ':photo' => $photo,
        ]);
    }

    // Récupère tous les livres d'un utilisateur spécifique en fonction de son ID
    public function getBooksByUserId(int $userId): array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM book WHERE user_id = :userId ORDER BY created_at DESC'
        );
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Compte le nombre de livres d'un utilisateur spécifique en fonction de son ID
    public function countBooksByUserId(int $userId): int
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM book WHERE user_id = :userId');
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }
}

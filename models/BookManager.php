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
}
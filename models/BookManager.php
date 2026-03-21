<?php
declare(strict_types=1);

class BookManager
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

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
}
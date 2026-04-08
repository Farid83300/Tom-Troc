<?php

declare(strict_types=1);

class MessageManager
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Envoyer un message
    public function sendMessage(int $senderId, int $receiverId, string $content): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO message (sender_id, recipient_id, content, created_at, is_read)
            VALUES (:sender_id, :recipient_id, :content, NOW(), 0)
        ");
        return $stmt->execute([
            'sender_id'    => $senderId,
            'recipient_id' => $receiverId,
            'content'      => $content,
        ]);
    }

    // Liste des conversations (interlocuteurs uniques)
    public function getConversationsByUser(int $userId): array
    {
        $stmt = $this->db->prepare("
            SELECT 
                u.id,
                u.pseudo,
                u.profile_picture,
                MAX(m.content) AS last_message,
                MAX(m.created_at) AS last_date,
                SUM(CASE WHEN m.is_read = 0 AND m.recipient_id = :uid1 THEN 1 ELSE 0 END) AS unread_count
            FROM message m
            JOIN user u ON u.id = CASE 
                WHEN m.sender_id = :uid2 THEN m.recipient_id 
                ELSE m.sender_id 
            END
            WHERE m.sender_id = :uid3 OR m.recipient_id = :uid4
            GROUP BY u.id, u.pseudo, u.profile_picture
            ORDER BY last_date DESC
        ");
        $stmt->execute([
            'uid1' => $userId,
            'uid2' => $userId,
            'uid3' => $userId,
            'uid4' => $userId,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Messages entre 2 utilisateurs
    public function getMessagesBetween(int $userId1, int $userId2): array
    {
        $stmt = $this->db->prepare("
            SELECT 
                m.*,
                u.pseudo AS sender_name,
                u.profile_picture AS sender_avatar
            FROM message m
            JOIN user u ON u.id = m.sender_id
            WHERE (m.sender_id = :uid1 AND m.recipient_id = :uid2)
               OR (m.sender_id = :uid3 AND m.recipient_id = :uid4)
            ORDER BY m.created_at ASC
        ");
        $stmt->execute([
            'uid1' => $userId1,
            'uid2' => $userId2,
            'uid3' => $userId2,
            'uid4' => $userId1,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Marquer les messages comme lus
    public function markAsRead(int $senderId, int $receiverId): void
    {
        $stmt = $this->db->prepare("
            UPDATE message 
            SET is_read = 1 
            WHERE sender_id = :sender_id 
              AND recipient_id = :receiver_id 
              AND is_read = 0
        ");
        $stmt->execute([
            'sender_id'   => $senderId,
            'receiver_id' => $receiverId,
        ]);
    }

    // Compter les messages non lus (pour le badge header)
    public function countUnread(int $userId): int
    {
        $stmt = $this->db->prepare("
            SELECT COUNT(*) 
            FROM message 
            WHERE recipient_id = :uid AND is_read = 0
        ");
        $stmt->execute(['uid' => $userId]);
        return (int) $stmt->fetchColumn();
    }
}

<?php
declare(strict_types=1);

class BookController
{
    // Affiche la liste de tous les livres disponibles sur le site, avec une option de recherche par titre
    public function showBooks(): void
    {
        $db = DBManager::getInstance()->getPDO();
        $bookManager = new BookManager($db);

        $search = trim($_GET['search'] ?? '');

        if ($search !== '') {
            $books = $bookManager->searchBooks($search);
        } else {
            $books = $bookManager->getAllBooks();
        }

        $view = new View('Nos livres à l\'échange');
        $view->render('books', [
            'books' => $books,
            'search' => $search,
        ]);
    }

    // Affiche les détails d'un livre spécifique en fonction de son ID
    public function showSingleBook(): void
    {
        $id = (int) ($_GET['id'] ?? 0);

        $db = DBManager::getInstance()->getPDO();
        $bookManager = new BookManager($db);
        $book = $bookManager->getBookById($id);

        $view = new View($book['title']);
        $view->render('single-book', ['book' => $book]);
    }
    
    public function showEditBook(): void
    {
        $id = (int) ($_GET['id'] ?? 0);

        // Vérifie que l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $db = DBManager::getInstance()->getPDO();
        $bookManager = new BookManager($db);
        $book = $bookManager->getBookById($id);

        // Vérifie que le livre appartient à l'utilisateur connecté
        if ($book['user_id'] !== $_SESSION['user']['id']) {
            header('Location: index.php?action=single-book&id=' . $id);
            exit;
        }

        $view = new View('Éditer un livre');
        $view->render('edit-book', ['book' => $book]);
    }

    public function updateBook(): void
    {
        $id = (int) ($_GET['id'] ?? 0);

        // Vérifie que l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $db = DBManager::getInstance()->getPDO();
        $bookManager = new BookManager($db);
        $book = $bookManager->getBookById($id);

        // Vérifie que le livre appartient à l'utilisateur connecté
        if ($book['user_id'] !== $_SESSION['user']['id']) {
            header('Location: index.php?action=single-book&id=' . $id);
            exit;
        }

        $title = trim($_POST['title'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $availability = (int) ($_POST['availability'] ?? 0);

        $photo = $book['photo'];

        $bookManager->updateBook($id, $title, $author, $description, $availability, $photo);

        header('Location: index.php?action=single-book&id=' . $id);
        exit;
    }
}
<?php
declare(strict_types=1);

class BookController
{
    public function showBooks(): void
    {
        $db= DBManager::getInstance()->getPDO();
        $bookManager = new BookManager($db);
        $books = $bookManager->getAllBooks();

        $view = new View('Nos livres à l\'échange');
        $view->render('books', ['books' => $books]);
    }

    public function showSingleBook(): void
    {
        $view = new View('Détail du livre');
        $view->render('single-book');
    }

    public function editBook(): void
    {
        $view = new View('Éditer un livre');
        $view->render('edit-book');
    }
}
<!-- Page des livres disponibles du site Tom Troc -->
<?php $currentPage = 'books'; ?>

<section class="books-page">
    <div class="books-header">
        <h1>Nos livres à l'échange</h1>
        <form class="search-bar" method="get" action="index.php">
            <input type="hidden" name="action" value="books">
            <span class="search-icon">&#128269;</span>
            <input type="text" name="search" placeholder="Rechercher un livre">
        </form>
    </div>

    <div class="books-grid">
        <?php foreach ($books as $book) : ?>
            <a href="index.php?action=single-book&id=<?= $book['id'] ?>" class="book-card">
                <div class="book-card-image">
                    <img src="<?= htmlspecialchars($book['photo']) ?>" alt="<?= htmlspecialchars($book['title']) ?>">
                </div>
                <h2><?= htmlspecialchars($book['title']) ?></h2>
                <p class="book-author"><?= htmlspecialchars($book['author']) ?></p>
                <p class="book-seller">Vendu par : <?= htmlspecialchars($book['pseudo']) ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</section>


<!-- Page de détail d'un livre du site Tom Troc -->
<?php $currentPage = 'single-book'; ?>

<section class="single-book-section">
    <div class="single-book-left">
        <nav class="breadcrumb">
            <a href="index.php?action=books">Nos livres</a> > <?= htmlspecialchars($book['title']) ?>
        </nav>
        <div class="single-book-image">
            <img src="<?= htmlspecialchars($book['photo']) ?>" alt="<?= htmlspecialchars($book['title']) ?>">
        </div>
    </div>
    <div class="single-book-info">
        <h1><?= htmlspecialchars($book['title']) ?></h1>
        <p class="book-author">par <?= htmlspecialchars($book['author']) ?></p>
        <hr>
        <h2>Description</h2>
        <p class="book-description"><?= htmlspecialchars($book['description']) ?></p>
        <h2>Propriétaire</h2>
        <a href="index.php?action=public-account&id=<?= $book['user_id'] ?>" class="book-owner">
            <img src="<?= htmlspecialchars($book['profile_picture']) ?>" alt="<?= htmlspecialchars($book['pseudo']) ?>">
            <span><?= htmlspecialchars($book['pseudo']) ?></span>
        </a>
        <a href="index.php?action=messenger&user=<?= $book['user_id'] ?>" class="btn-primary btn-large">Envoyer un message</a>
    </div>
</section>
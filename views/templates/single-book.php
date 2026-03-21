<!-- Page de détail d'un livre du site Tom Troc -->
<?php $currentPage = 'single-book'; ?>

<h1><?= htmlspecialchars($book['title']) ?></h1>
<p>par <?= htmlspecialchars($book['author']) ?></p>
<p><?= htmlspecialchars($book['description']) ?></p>
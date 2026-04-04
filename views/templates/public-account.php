<!-- Page de détail d'un compte public du site Tom Troc -->
<?php $currentPage = 'public-account'; ?>

<section class="public-account-section">
    <div class="public-account-top">
        <!-- PARTIE GAUCHE : PROFIL -->
        <div class="public-account-profile">
            <div class="public-account-avatar">
                <img src="<?= htmlspecialchars($owner['profile_picture']) ?>" alt="<?= htmlspecialchars($owner['pseudo']) ?>">
            </div>
            <hr>
            <h2 class="public-account-pseudo"><?= htmlspecialchars($owner['pseudo']) ?></h2>
            <p class="public-account-member"><?= htmlspecialchars($memberSince) ?></p>
            <p class="public-account-library-title">Bibliothèque</p>
            <p class="public-account-library-count">
                <img src="assets/img/icons/Bibliotheque-Vector.svg" alt="" class="icon-library">
                <?= $bookCount ?> livre<?= $bookCount > 1 ? 's' : '' ?>
            </p>
            <a href="index.php?action=messenger&user=<?= $owner['id'] ?>" class="public-account-btn">Écrire un message</a>
        </div>

        <!-- PARTIE DROITE : LIVRES -->
        <div class="public-account-books">
            <table class="public-account-table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <td><img src="<?= htmlspecialchars($book['photo']) ?>" alt="<?= htmlspecialchars($book['title']) ?>" class="public-book-thumb"></td>
                            <td><?= htmlspecialchars($book['title']) ?></td>
                            <td><?= htmlspecialchars($book['author']) ?></td>
                            <td class="public-book-desc"><?= htmlspecialchars(mb_substr($book['description'], 0, 80)) ?>...</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
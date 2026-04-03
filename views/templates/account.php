<!-- Page de détail de votre compte du site Tom Troc -->
<?php $currentPage = 'account'; ?>

<section class="account-section">
    <h1>Mon compte</h1>

    <div class="account-top">
        <!-- PARTIE GAUCHE : PROFIL -->
        <div class="account-profile">
            <div class="account-avatar">
                <img src="<?= htmlspecialchars($user['profile_picture']) ?>" alt="Photo de profil" id="avatar-preview">
                <form action="index.php?action=update-avatar" method="post" enctype="multipart/form-data" id="avatar-form">
                    <label class="account-avatar-edit">
                        modifier
                        <input type="file" name="avatar" accept="image/*" hidden id="avatar-input">
                    </label>
                </form>
            </div>
            <hr>
            <h2 class="account-pseudo"><?= htmlspecialchars($user['pseudo']) ?></h2>
            <p class="account-member"><?= htmlspecialchars($memberSince) ?></p>
            <p class="account-library-title">Bibliothèque</p>
            <p class="account-library-count">
                <img src="assets/img/icons/Bibliotheque-Vector.svg" alt="" class="icon-library">
                <?= $bookCount ?> livre<?= $bookCount > 1 ? 's' : '' ?>
            </p>
        </div>

        <!-- PARTIE DROITE : INFORMATIONS -->
        <div class="account-info">
            <h2>Vos informations personnelles</h2>
            <form action="index.php?action=account" method="post" class="account-form">
                <div class="account-form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>">
                </div>
                <div class="account-form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="••••••••">
                </div>
                <div class="account-form-group">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user['pseudo']) ?>">
                </div>
                <button type="submit" class="account-btn-submit">Enregistrer</button>
            </form>
        </div>
    </div>

    <!-- TABLEAU DES LIVRES -->
    <div class="account-books">
        <table class="account-table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Description</th>
                    <th>Disponibilité</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book) : ?>
                    <tr>
                        <td><img src="<?= htmlspecialchars($book['photo']) ?>" alt="<?= htmlspecialchars($book['title']) ?>" class="account-book-thumb"></td>
                        <td><?= htmlspecialchars($book['title']) ?></td>
                        <td><?= htmlspecialchars($book['author']) ?></td>
                        <td class="account-book-desc"><?= htmlspecialchars(mb_substr($book['description'], 0, 80)) ?>...</td>
                        <td>
                            <?php if ($book['availability'] == 1) : ?>
                                <span class="badge-available">disponible</span>
                            <?php else : ?>
                                <span class="badge-unavailable">non dispo.</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="account-actions">
                                <a href="index.php?action=edit-book&id=<?= $book['id'] ?>">Éditer</a>
                                <a href="index.php?action=delete-book&id=<?= $book['id'] ?>" class="action-delete" onclick="return confirm('Voulez-vous vraiment supprimer ce livre ?')">Supprimer</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
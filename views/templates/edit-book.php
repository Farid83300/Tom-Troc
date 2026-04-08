<!-- Page d'édition d'un livre du site Tom Troc -->
<?php $currentPage = 'edit-book'; ?>

<div class="edit-book-page">
    <div class="edit-book-container">
        <nav class="edit-breadcrumb">
            <a href="index.php?action=account">&larr; retour</a>
        </nav>
        <h1 class="h1-small">Modifier les informations</h1>
        <div class="edit-book-section">            
            <div class="edit-book-left">
                <label class="edit-label">Photo</label>
                <div class="edit-book-image-wrapper">
                    <div class="edit-book-image">
                        <img src="<?= htmlspecialchars($book['photo']) ?>" alt="<?= htmlspecialchars($book['title']) ?>">
                    </div>
                    <label class="edit-photo-link">
                        Modifier la photo
                        <input type="file" name="photo" accept="image/*" hidden>
                    </label>
                </div>
            </div>
            <form action="index.php?action=edit-book&id=<?= $book['id'] ?>" method="post" enctype="multipart/form-data" class="edit-book-form">
                <div class="edit-book-right">
                    <div class="edit-form-group">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" value="<?= htmlspecialchars($book['title']) ?>">
                    </div>
                    <div class="edit-form-group">
                        <label for="author">Auteur</label>
                        <input type="text" id="author" name="author" value="<?= htmlspecialchars($book['author']) ?>">
                    </div>
                    <div class="edit-form-group">
                        <label for="description">Commentaire</label>
                        <textarea id="description" name="description" rows="10"><?= htmlspecialchars($book['description']) ?></textarea>
                    </div>
                    <div class="edit-form-group">
                        <label for="availability">Disponibilité</label>
                        <select id="availability" name="availability">
                            <option value="1" <?= $book['availability'] == 1 ? 'selected' : '' ?>>disponible</option>
                            <option value="0" <?= $book['availability'] == 0 ? 'selected' : '' ?>>non disponible</option>
                        </select>
                    </div>
                    <button type="submit" class="edit-btn-submit">Valider</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
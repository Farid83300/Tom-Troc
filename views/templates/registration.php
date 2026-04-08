<!-- Page d'inscription du site Tom Troc -->
<?php $currentPage = 'registration'; ?>

<section class="registration-section">
    <div class="registration-content">
        <h1>Inscription</h1>

        <form action="index.php?action=registration" method="post" class="registration-form">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>
        <!-- Affichage des messages d'erreur ou de succès -->
        <?php if (isset($_SESSION['error'])) : ?>
            <p class="flash-error"><?= htmlspecialchars($_SESSION['error']) ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])) : ?>
            <p class="flash-success"><?= htmlspecialchars($_SESSION['success']) ?></p>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <button type="submit">S'inscrire</button>
        </form>
        <p>Déjà inscrit ? <a href="index.php?action=login">Connectez-vous</a></p>
    </div>
    <div class="registration-separator">
        <img src="assets/img/inscription.png" alt="Image d'inscription" class="registration-image">
    </div>
</section>
<!-- Page de connexion du site Tom Troc -->
<?php $currentPage = 'login'; ?>

<section class="login-section">
    <div class="login-content">
        <h2>Connexion</h2>
        <form action="index.php?action=login" method="post" class="login-form">
            <div class="form-group">
                <label for="email">Adresse email</label>
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
            <button type="submit">Se connecter</button>
        </form>
        <p>Pas de compte ? <a href="index.php?action=registration">Inscrivez-vous</a></p>
    </div>
    <div class="login-separator">
        <img src="assets/img/inscription.png" alt="Image de connexion" class="login-image">
    </div>
</section>
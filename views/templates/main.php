<!--  Templates contenant le Header et le Footer qui s'affiche sur toutes les pages-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?> - Tom Troc</title>
        <link rel="stylesheet" href="assets/css/global.css">
        <link rel="stylesheet" href="assets/css/<?= $currentPage ?>.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <header class="site-header">
            <img src="assets/img/logo/logo.svg" class="logo-header" alt="Logo de Tom Troc">
            <nav class="nav-left">
                <a href="index.php?action=home" <?= $currentPage === 'home' ? 'class="active"' : '' ?>>Accueil</a>
                <a href="index.php?action=books" <?= $currentPage === 'books' ? 'class="active"' : '' ?>>Nos livres à l'échange</a>
            </nav>
            <nav class="nav-right">
                <a href="index.php?action=messenger" <?= $currentPage === 'messenger' ? 'class="active"' : '' ?>>
                    <img src="assets/img/icons/Icon messagerie.png" alt="" class="icon-nav">
                    Messagerie
                    <span class="badge-notif">2</span>
                </a>
                <a href="index.php?action=account" <?= $currentPage === 'account' ? 'class="active"' : '' ?>>
                    <img src="assets/img/icons/Icon mon compte.png" alt="" class="icon-nav">
                    Mon compte
                </a>
                <a href="index.php?action=login" <?= $currentPage === 'login' ? 'class="active"' : '' ?>>Connexion</a>
            </nav>
        </header>
        <main>
            <?= $content ?>
        </main>
        <footer class="site-footer">
            <img src="assets/img/logo/logo-footer.svg" class="logo-footer"alt="Logo de Tom Troc">
            <nav class="menu-footer">
                <a href="/">Politique de confidentialité</a>
                <a href="/">Mentions légales</a>
                <a href="/">Tom Troc©</a>
            </nav>
        </footer>
    </body>
</html>
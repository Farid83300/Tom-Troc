<!-- Page d'acceuil du site Tom Troc -->
<?php $currentPage = 'home'; ?>

<section class="hero-section">
    <div class="hero-content">
        <h1>Rejoignez nos lecteurs passionnés</h1>
        <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
        <a href="index.php?action=books" class="btn-primary">Découvrir</a>
    </div>
    <div class="hero-image">
        <img src="assets/img/hamza-nouasria.png" alt="Image d'accueil de Tom Troc" class="hero-img">
        <p>Hamza</p>
    </div>
</section>
<section class="last-books-section">
    <h2>Les derniers livres ajoutés</h2>
    <div class="last-books">
        <?php foreach ($lastBooks as $book) : ?>
            <a href="index.php?action=single-book&id=<?= $book['id'] ?>" class="book-card">
                <div class="book-card-image">
                    <img src="<?= htmlspecialchars($book['photo']) ?>" alt="<?= htmlspecialchars($book['title']) ?>">
                </div>
                <h3><?= htmlspecialchars($book['title']) ?></h3>
                <p class="book-author"><?= htmlspecialchars($book['author']) ?></p>
                <p class="book-seller">Vendu par : <?= htmlspecialchars($book['pseudo']) ?></p>
            </a>
        <?php endforeach; ?>
    </div>
    <a href="index.php?action=books" class="btn-primary btn-large">Voir tous les livres</a>
</section>
<section class="how-does-it-work">
    <h2>Comment ça marche ?</h2>
    <p>Échanger des livres avec TomTroc c’est simple et<br> amusant ! Suivez ces étapes pour commencer :</p>
    <div class="how-doing-card">
        <a href="index.php?action=registration" class="how-doing-over">
            <img src="assets/img/how-doing-1.png" alt="Comment faire 1" class="book-cover">
        </a>
        <a href="index.php?action=account" class="how-doing-over">
            <img src="assets/img/how-doing-2.png" alt="Comment faire 2" class="book-cover">
        </a>
        <a href="index.php?action=books" class="how-doing-over">
            <img src="assets/img/how-doing-3.png" alt="Comment faire 3" class="book-cover">
        </a>
        <a href="index.php?action=messenger" class="how-doing-over">
            <img src="assets/img/how-doing-4.png" alt="Comment faire 4" class="book-cover">
        </a>
    </div>
    <a href="index.php?action=books" class="btn-primary btn-large btn-transparent">Voir tous les livres</a>
</section>
<img src="assets/img/banner-separator.png" alt="Image de séparation" class="separator-image">
<section class="about-us-section">
    <h2>Nos valeurs</h2>
    <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
    <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
    <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
    <p class="team-signature">L'équipe Tom Troc</p>
    <img src="assets/img/green-heart.svg" alt="" class="heart-icon">
</section>
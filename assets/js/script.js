// Menu Burger
const burgerMenu = document.getElementById('burger-menu');
const navWrapper = document.getElementById('nav-wrapper');
const navOverlay = document.getElementById('nav-overlay');

if (burgerMenu) {
    burgerMenu.addEventListener('click', function () {
        burgerMenu.classList.toggle('active');
        navWrapper.classList.toggle('open');
        navOverlay.classList.toggle('open');
        document.body.classList.toggle('menu-open');
    });
    navOverlay.addEventListener('click', function () {
        burgerMenu.classList.remove('active');
        navWrapper.classList.remove('open');
        navOverlay.classList.remove('open');
        document.body.classList.remove('menu-open');
    });
    navWrapper.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            burgerMenu.classList.remove('active');
            navWrapper.classList.remove('open');
            navOverlay.classList.remove('open');
            document.body.classList.remove('menu-open');
        });
    });
}

// Téléversement image avatar profil
const avatarInput = document.getElementById('avatar-input');
const avatarPreview = document.getElementById('avatar-preview');
const avatarForm = document.getElementById('avatar-form');

if (avatarInput) {
    avatarInput.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            // Prévisualisation de l'image
            const reader = new FileReader();
            reader.onload = function (e) {
                avatarPreview.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);

            // Soumission automatique du formulaire
            avatarForm.submit();
        }
    });
}
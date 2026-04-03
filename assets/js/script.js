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
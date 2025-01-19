document.addEventListener('DOMContentLoaded', () => {
    const editButton = document.getElementById('editButton');
    const updateForm = document.getElementById('updateForm');
    const profileInfo = document.getElementById('profileInfo');

    editButton.addEventListener('click', () => {
        if (updateForm.style.display === 'none') {
            // Remplir les champs du formulaire avec les valeurs actuelles de l'utilisateur
            document.getElementById('emailInput').value = document.getElementById('emailText').textContent;
            document.getElementById('nomInput').value = document.getElementById('nomText').textContent;
            document.getElementById('prenomInput').value = document.getElementById('prenomText').textContent;
            document.getElementById('telephoneInput').value = document.getElementById('telephoneText').textContent;

            // Afficher le formulaire et masquer les informations de profil
            updateForm.style.display = 'block';
            profileInfo.style.display = 'none';
        } else {
            // Masquer le formulaire et afficher les informations de profil
            updateForm.style.display = 'none';
            profileInfo.style.display = 'block';
        }
    });
});

function deleteUser(userId, userNom, userPrenom) {
    if (confirm(`Êtes-vous sûr de vouloir désactiver ${userNom} ${userPrenom} ?`)) {
        window.location.href = `?controller=user&action=desactivateUser&userId=${userId}`;
    }
}

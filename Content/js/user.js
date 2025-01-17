document.getElementById('editButton').addEventListener('click', function() {
    var updateForm = document.getElementById('updateForm');
    var profileInfo = document.getElementById('profileInfo');

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
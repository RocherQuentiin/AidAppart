document.addEventListener('DOMContentLoaded', () => {
    const updateButtons = document.querySelectorAll('#update_user');

    updateButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const userId = event.target.closest('tr').querySelector('td:first-child').textContent;
            openRolePopup(userId);
        });
    });
});

function openRolePopup(userId) {
    console.log('openRolePopup');
    // Create the popup container
    const popup = document.createElement('div');
    popup.classList.add('popup');
    
    // Create the popup content
    const popupContent = document.createElement('div');
    popupContent.classList.add('popup-content');
    
    // Add the form to the popup content
    popupContent.innerHTML = `
        <h2>Modifier les rôles de l'utilisateur</h2>
        <form id="role-form">
            <label for="roles">Rôles:</label>
            <select id="roles" name="roles" multiple>
                <option value="1">Admin</option>
                <option value="2">Propriétaire</option>
                <option value="3">Etudiant</option>
                <option value="4">Visiteur</option>
            </select>
            <button type="submit">Enregistrer</button>
            <button type="button" id="close-popup">Annuler</button>
        </form>
    `;
    
    // Append the popup content to the popup container
    popup.appendChild(popupContent);
    
    // Append the popup container to the body
    document.body.appendChild(popup);
    
    // Add event listener to close the popup
    document.getElementById('close-popup').addEventListener('click', () => {
        document.body.removeChild(popup);
    });
    
    // Add event listener to handle form submission
    document.getElementById('role-form').addEventListener('submit', (event) => {
        event.preventDefault();
        const selectedRoles = Array.from(document.getElementById('roles').selectedOptions).map(option => option.value);
        updateUserRoles(userId, selectedRoles);
        document.body.removeChild(popup);
    });
}

function updateUserRoles(userId, roles) {
    fetch('?controller=admin&action=assign_role', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: userId, role: roles })
    })
    .then(data => {
        if (data.ok) {
            alert('Rôles mis à jour avec succès');
            location.reload();
        } else {
            alert('Erreur lors de la mise à jour des rôles');
        }
    })
    .catch(error => {
        alert('Erreur lors de la mise à jour des rôles');
    });
}
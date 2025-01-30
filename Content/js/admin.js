document.addEventListener('DOMContentLoaded', () => {
    const input = document.querySelector("input");
    const updateButtons = document.querySelectorAll('#update_user');

    let users = [];
    fetch('?controller=admin&action=get_user', {
        headers: {
            'Content-Type': 'application/json'
        },
        method: 'POST'
    }).then(response => {
        return response.json();
    })
    .then(data => {
        users = data;
    });

    if (input) {
        input.addEventListener("input", selectUsers);
    }

    function selectUsers(e) {
        const tbody = document.getElementById('table-body');
        tbody.innerHTML = '';
        users.filter(user => {
            return user.prenom.toLowerCase().includes(e.target.value.toLowerCase()) || 
                   user.nom.toLowerCase().includes(e.target.value.toLowerCase()) || 
                   user.email.toLowerCase().includes(e.target.value.toLowerCase());
        }).forEach(user => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
            <td>${user.id}</td>
            <td>${user.nom}</td>
            <td>${user.prenom}</td>
            <td>${user.email}</td>
            <td>${user.roles.join(', ')}</td>
            <td>${user.creer_a}
            <td>
                <button id="update_user" class="button">Modifier</button>
                <button class="delete button" id="delete_user" onclick="deleteUser(${user.id}, '${user.nom}', '${user.prenom}')">
                    <img src='Content/Images/Poubelle.png' alt='Supprimer'>
                </button>
            </td>
            `;
            tbody.appendChild(tr);
        });
    }
    updateButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const userId = event.target.closest('tr').querySelector('td:first-child').textContent;
            openRolePopup(userId);
        });
    });
});

function updateValue(e, log) {
    console.log(e.target.value);
    log.textContent = e.target.value;
 }



function openRolePopup(userId) {
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

function deleteUser(userId, lastname, firstname) {
    if (confirm('Êtes-vous sûr de vouloir supprimer l\'utilisateur ' + lastname + ' ' + firstname + '  ?')) {
        fetch('?controller=admin&action=delete_user', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: userId })
        })
        .then(data => {
            if (data.ok) {
                alert('Utilisateur supprimé avec succès');
                location.reload();
            } else {
                alert('Erreur lors de la suppression de l\'utilisateur');
            }
        })
        .catch(error => {
            alert('Erreur lors de la suppression de l\'utilisateur');
        });
    }
}

function deleteLogement(logementId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer le logement n° ' + logementId + ' ?')) {
        fetch('?controller=admin&action=delete_logement', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: logementId })
        })
        .then(data => {
            if (data.ok) {
                alert('Logement supprimé avec succès');
                location.reload();
            } else {
                alert('Erreur lors de la suppression du logement');
            }
        })
        .catch(error => {
            alert('Erreur lors de la suppression du logement');
        });
    }
}

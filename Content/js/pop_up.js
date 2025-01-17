// Fonction pour afficher un pop-up
function showModal(message, type) {
    // Créer le modal
    let modal = document.createElement('div');
    modal.style.position = 'fixed';
    modal.style.top = '50%';
    modal.style.left = '50%';
    modal.style.transform = 'translate(-50%, -50%)';
    modal.style.backgroundColor = type === 'success' ? '#4CAF50' : '#f44336'; // Vert pour succès, rouge pour erreur
    modal.style.color = 'white';
    modal.style.padding = '20px';
    modal.style.borderRadius = '5px';
    modal.style.zIndex = '1000';
    modal.style.textAlign = 'center';
    modal.style.fontSize = '18px';
    
    // Ajouter le message
    modal.innerText = message;
   
    // Ajouter le modal au body
    document.body.appendChild(modal);

    // Fermer le modal après 5 secondes
    setTimeout(() => {
        modal.remove();
    }, 5000);
}
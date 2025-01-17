document.addEventListener("DOMContentLoaded", () => {
  const showMoreButton = document.getElementById("show-more");
  const showRoomsButton = document.getElementById("show-more-ch");
  const modal = document.getElementById("image-modal"); 
  const closeModal = document.querySelector(".close");

  
  const openModal = () => {
    modal.style.display = "flex";
  };

  const closeModalHandler = () => {
    modal.style.display = "none"; 
  };

  if (showMoreButton) {
    showMoreButton.addEventListener("click", openModal);
  }

  if (showRoomsButton) {
    showRoomsButton.addEventListener("click", openModal);
  }

  if (closeModal) {
    closeModal.addEventListener("click", closeModalHandler);
  }

  window.addEventListener("click", (event) => {
    if (event.target === modal) {
      closeModalHandler();
    }
  });
});

function reportLogement(logementId) {
  const commentaire = prompt('Veuillez entrer un commentaire pour le signalement:');
  // TODO : verifier que l'utiisateur est connecté
  if (commentaire) {
      const reportData = {
          id_logement: logementId,
          id_utilisateur: window.userId,
          commentaire: commentaire
      };

      fetch('?controller=pagelogement&action=report', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json'
          },
          body: JSON.stringify(reportData)
      })
      .then(data => {
          if (data.ok) {
              alert('Logement signalé avec succès.');
          } else {
              alert('Erreur lors du signalement du logement.');
          }
      })
      .catch(error => {
          console.error('Error:', error);
          // TODO : comprendre pourquoi ça enregistre dans la bd mais ne passe pas dans le then
          alert('Erreur lors du signalement du logement.');
      });
  }
}

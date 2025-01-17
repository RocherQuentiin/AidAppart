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

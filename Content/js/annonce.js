document.addEventListener("DOMContentLoaded", () => {
    const showMoreButton = document.getElementById("show-more");
    const modal = document.getElementById("image-modal");
    const closeModal = document.querySelector(".close");
  
    // Show the modal when the button is clicked
    showMoreButton.addEventListener("click", () => {
      modal.style.display = "flex";
    });
  
    // Close the modal when the close button is clicked
    closeModal.addEventListener("click", () => {
      modal.style.display = "none";
    });
  
    // Close the modal when clicking outside the modal content
    window.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  });
  
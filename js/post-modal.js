// Récupération du modal
const modal = document.querySelector(".modal-overlay");
// Récupération du bouton d'ouverture du modal
const openModal = document.getElementById("modal-button");
// Récupération du bouton de fermeture du modal
const closeModal = document.getElementById("not-distribute");

// Désactivation de la classe hidden de l'overlay
openModal.addEventListener("click", () => {
    modal.classList.remove("hidden");
});

// Réactivation de la classe hidden de l'overlay
closeModal.addEventListener("click", () => {
    modal.classList.add("hidden");
});

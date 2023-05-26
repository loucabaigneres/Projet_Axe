// Récupération du modal de suppression
const deleteModal = document.querySelector(".delete-overlay");
// Récupération du bouton d'ouverture du modal de suppression
const openDeleteModal = document.querySelectorAll(".poubelle");
// Récupération du bouton de fermeture du modal de suppression
const closeDeleteModal = document.querySelector(".non");

// Boucle permettant d'ouvrir un seul modal de suppression pour tous les posts
openDeleteModal.forEach((poubelle) => {
    poubelle.addEventListener("click", () => {
        deleteModal.classList.remove("delete-hidden");
    });
});

// Fermeture du modal lors du clic du bouton
closeDeleteModal.addEventListener("click", () => {
    deleteModal.classList.add("delete-hidden");
});

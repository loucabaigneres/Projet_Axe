// Apparition/disparition de la sidebar
document.querySelector("#burger").addEventListener("click", () => {
    const sidebar = document.querySelector(".sidebar-overlay");
    sidebar.classList.toggle("active");
});

// Récupération de l'id "cross" sur le burger menu
const cross = document.getElementById("cross");
const burger = document.getElementById("burger");

// Gestionnaire d'événement sur le a#link pour venir changer l'attribution de la classe .open à la ul et au span#burger
cross.addEventListener("click", () => {
    burger.classList.toggle("cross-it");
});

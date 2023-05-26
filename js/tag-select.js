// Récupération de la balise de sélection des tags
const element = document.getElementById("tag-select-list");
// Récupération des boutons de tags
let tagButton = document.querySelectorAll(".tag-selected");

// Boucle permettant à la fois d'attribuer les mêmes valeurs aux options de sélection qu'aux boutons tout en réactivant le bouton de publication
tagButton.forEach((button) => {
    button.addEventListener("click", () => {
        element.value = button.getAttribute("data-tag");
        tagCheck();
    });
});

// Récupération des tags de post
let tags = document.querySelectorAll(".tags-container > .tags > .tag");

// Récupération du container des posts
const publications = document.querySelector(".all-publications");

// Récupération des variables de couleur dans le root
const r = document.querySelector(":root");
const rs = getComputedStyle(r);
const background = document.querySelector(".header");

// Boucle permettant de récupérer le numéro du tag correspondant au tag sur lequel on clique
const replaceAllFilters = (filter) => {
    for (let i = 1; i < tags.length; i++) {
        publications.style.setProperty("--tag-" + i, filter);
    }
};

// Boucle permettant de n'afficher que les tags correspondant au numéro sélectionné, ou bien tous les tags si le tag 0 est sélectionné
for (let i = 0; i < tags.length; i++) {
    const tag = tags[i];
    tag.addEventListener("click", () => {
        if (i == 0) {
            replaceAllFilters("flex");
            background.style = null;
        } else {
            replaceAllFilters("none");
            publications.style.setProperty("--tag-" + i, "flex");
            const tagColor = rs.getPropertyValue("--tag-color-" + i);
            background.style.setProperty("background-color", tagColor);
        }
    });
}

replaceAllFilters("flex");

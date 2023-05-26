let notSignedUp = false;

// Récupération du container de posts
const accueil = document.querySelector(".post-container");

// Activation de la popup de proposition de connexion lors du scroll de la page de post
accueil.addEventListener("scroll", () => {
    if (!notSignedUp) {
        setTimeout(() => {
            document.querySelector(".popup-overlay").style.display = "flex";
        }, 2000);
        notSignedUp = true;
    }
});

// Récupération de bouton de fermeture de la popup
const closePopup = document.querySelector(".close-popup");

// Fermeture de la poup lors du clic du bouton
closePopup.addEventListener("click", () => {
    document.querySelector(".popup-overlay").style.display = "none";
});

// Récupération du bouton d'envoi vers la page de connexion
const goSignUp = document.querySelector(".go-sign-up");

// Envoie vers la page de connexion lors du clic du bouton
goSignUp.addEventListener("click", () => {
    window.location.href = "./pages/login/login.html";
});

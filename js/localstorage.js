// Variable récupérant l'id du textarea à sauvegarder
const inputMessage = document.getElementById("post_content");
const inputImage = document.getElementById("post_pic");

// Écoute de la saisie de l'utilisateur dans l'input d'écriture
inputMessage.addEventListener("input", () => {
    // Enregistrement de la saisie dans le Local Storage
    localStorage.setItem("post_content", inputMessage.value);
});

// Écoute de la saisie de l'utilisateur dans l'input d'image
inputImage.addEventListener("change", (event) => {
    // Conversion de l'image en URL
    const image = event.target.files[0];
    const reader = new FileReader();
    reader.readAsDataURL(image);

    reader.addEventListener("load", () => {
        localStorage.setItem("post_pic", reader.result);
        console.log(reader.result);
    });
    // Enregistrement de la saisie dans le Local Storage
    // localStorage.setItem(image, inputImage.value);
    // console.log(image);
});

// Vérification de la présence d'une saisie dans le Local Storage
const draftMessage = localStorage.getItem("post_content");
if (draftMessage) {
    // Remplacement du contenu de l'input par la saisie présente dans le Local Storage
    inputMessage.value = draftMessage;
}

const draftImage = localStorage.getItem("post_pic");
if (draftImage) {
    // Remplacement du contenu de l'input par la saisie présente dans le Local Storage
    inputImage.value = draftImage;
}

// Variable récupérant l'id du bouton d'envoi du post
// const inputSubmit = document.getElementById("distribute");

// Supprime les données insérées dans le Local Storage lorsque le post est envoyé
// inputSubmit.addEventListener("click", () => {
//     localStorage.clear();
// });

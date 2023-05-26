<div class="modal-overlay hidden">
    <div class="modal">
        <div class="modal-header">
            <h2>Poster un truc ?</h2>
            <button id="not-distribute">Hm, non</button>
        </div>
        <div class="white-bar"></div>
        <div id="modal-tags" class="tags">
            <button data-tag="tag-1" class="tag-selected tag tag-1" name="Action">Action</button>
            <button data-tag="tag-2" class="tag-selected tag tag-2" name="Animation">Animation</button>
            <button data-tag="tag-3" class="tag-selected tag tag-3" name="Aventure">Aventure</button>
            <button data-tag="tag-4" class="tag-selected tag tag-4" name="Comédie">Comédie</button>
            <button data-tag="tag-5" class="tag-selected tag tag-5" name="Drame">Drame</button>
            <button data-tag="tag-6" class="tag-selected tag tag-6" name="Fantastique">Fantastique</button>
            <button data-tag="tag-7" class="tag-selected tag tag-7" name="Horreur">Horreur</button>
            <button data-tag="tag-8" class="tag-selected tag tag-8" name="Policier">Policier</button>
            <button data-tag="tag-9" class="tag-selected tag tag-9" name="Science-fiction">Science-fiction</button>
            <button data-tag="tag-10" class="tag-selected tag tag-10" name="Old-school">Old-school</button>
        </div>
        <form class="form-post" id="form-id" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="form" value="formulaire_ajout_post">
            <select name="post_tag" class="tag-select-list" id="tag-select-list">
                <option id=" no-tag-selected" value="no-tag-selected">Sélectionner un tag</option>
                <option value="tag-1">Action</option>
                <option value="tag-2">Animation</option>
                <option value="tag-3">Aventure</option>
                <option value="tag-4">Comédie</option>
                <option value="tag-5">Drame</option>
                <option value="tag-6">Fantastique</option>
                <option value="tag-7">Horreur</option>
                <option value="tag-8">Policier</option>
                <option value="tag-9">Science-fiction</option>
                <option value="tag-10">Old-school</option>
            </select>
            <textarea placeholder="Écrivez ici..." name="post_content" id="post_content" class="posting" cols="30"
                rows="10" required></textarea>
            <input name="post_pic" id="post_pic" type="file" accept="image/png, image/jpeg, image/gif"
                class="upload-file" onchange="sizeCheck()">
            <?= $fileSizeError ?? '' ?>
            <input id="distribute" class="send_button" type="submit" value="Pas de tag sélectionné" disabled="true">
        </form>
        <!-- <div class="add-file">
            <div>
                <i class="fi fi-rr-picture"></i>
                <p>Média</p>
            </div>
        </div> -->
        <!-- <button id="distribute" class="send_button" type="submit" value="Envoyer">
            <p>Poster</p>
        </button> -->
    </div>
</div>

<script>
    // Script de vérification de la taille de l'image et de blocage du bouton de publication si l'image est trop lourde
    sizeCheck = () => {
        const post_pic = document.getElementById('post_pic');
        if (post_pic.files.length > 0) {
            const fileSize = post_pic.files.item(0).size;
            const post_distribute = document.getElementById('distribute');
            const r = document.querySelector(":root");
            const rs = getComputedStyle(r);

            if (fileSize > 2097152) {
                post_distribute.disabled = true;
                post_distribute.value = "Fichier trop lourd";
                post_distribute.style.backgroundColor = "rgba(0, 0, 0, 0.05)"
            } else {
                post_distribute.disabled = false;
                post_distribute.value = "Poster";
                const buttonColor = rs.getPropertyValue("--background-dark");
                post_distribute.style.setProperty("background-color", buttonColor);
            }
        }
    }

    // Script de vérification de la sélection d'un tag et de de blocage du bouton de publication si aucun tag n'est sélectionné
    let tagCheck = () => {
        const post_distribute = document.getElementById('distribute');
        post_distribute.disabled = false;
        post_distribute.value = "Allons-y !";
        const buttonColor = rs.getPropertyValue("--background-dark");
        post_distribute.style.setProperty("background-color", buttonColor);
        post_distribute.style.cursor = "pointer";
        post_distribute.addEventListener("click", () => {
            localStorage.clear();
        });
    }
</script>
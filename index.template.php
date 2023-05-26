<?php require_once('./index.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Projet d'Axe</title>

    <link rel="stylesheet" href="./css/style.css" />

    <script defer src="./js/delete.js"></script>
    <script defer src="./js/filter.js"></script>
    <script defer src="./js/localstorage.js"></script>
    <script defer src="./js/popup.js"></script>
    <script defer src="./js/post-modal.js"></script>
    <script defer src="./js/sidebar.js"></script>
    <script defer src="./js/tag-select.js"></script>
</head>

<body>
    <!-- Récupération du modal de publication -->
    <?php require_once('./php/modal.template.php') ?>

    <!-- Si l'utilisateur est connecté, afficher le bouton flottant d'affichage du modal de publication -->
    <?php if ($_USER != null): ?>
        <div id="modal-button">
            <img class="icons" src="./images/icons/plus.png" alt="➕">
        </div>

        <!-- S'il n'est pas connecté, afficher la popup de proposition de connexion -->
    <?php else: ?>
        <div class="popup-overlay">
            <div class="sign-up-popup">
                <h2>On dirait que vous n'êtes pas connecté...</h2>
                <h3>Connectez-vous pour accéder à plus de fonctionnalités !</h3>
                <div>
                    <button class="close-popup">Plus tard</button>
                    <button class="go-sign-up">Se connecter</button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Récupération de la sidebar -->
    <?php require_once('./php/sidebar.template.php') ?>
    <main class="main">
        <header class="header">
            <a class="div-micromovie" href="./index.template.php">
                <h1 class="micromovie"></h1>
            </a>
            <div class="recherche">
                <form class="form-recherche" action="" method="get">
                    <input class="recherche" placeholder="Recherche de Kweets" type="text" name="recherche"
                        id="recherche">
                    <button type="submit" class="recherche-button">
                        <img class="icons" src="./images/icons/recherche.png" alt="🔎">
                    </button>
                </form>
            </div>
            <a id="cross" class="phone" href="#"><span id="burger"></span></a>
        </header>

        <div class="main-bottom">
            <!-- Récupération des posts -->
            <?php require_once('./php/posts/posts.template.php') ?>

            <div class="tags-container">
                <div class="tags">
                    <button class="tag tag-0">Tout afficher</button>
                    <button class="tag tag-1">Action</button>
                    <button class="tag tag-2">Animation</button>
                    <button class="tag tag-3">Aventure</button>
                    <button class="tag tag-4">Comédie</button>
                    <button class="tag tag-5">Drame</button>
                    <button class="tag tag-6">Fantastique</button>
                    <button class="tag tag-7">Horreur</button>
                    <button class="tag tag-8">Policier</button>
                    <button class="tag tag-9">Science-fiction</button>
                    <button class="tag tag-10">Old-school</button>
                </div>
                <!-- Si l'utilisateur n'est pas connecté, afficher la popup de proposition de connexion lorsque l'utilisateur essaie de créer une publication -->
                <?php if (isset($notconnected)): ?>
                    <div class="popup-not-connected">
                        <div class="sign-up-popup">
                            <h2>Vous devez être connecté pour poster</h2>
                            <div>
                                <button class="close-popup-not-connected">Plus tard</button>
                                <a href="./pages/login/login.html">
                                    <button class="go-sign-up">Se connecter</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>


</body>
<script>
    const closePopupNotConnected = document.querySelector(".close-popup-not-connected");


    closePopupNotConnected.addEventListener("click", () => {
        const popupNotConnected = document.querySelector(".popup-not-connected");
        popupNotConnected.style.display = "none";
    })
</script>

</html>
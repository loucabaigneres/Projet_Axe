<?php
require_once('./index.php');

// Si l'utilisateur n'est pas connecté, redirection vers la page d'accueil
if (!$_USER): {
        header('Location: index.template.php');
        exit;
    }
else:
    // Sinon, récupération des informations liées à l'utilisateur pour pouvoir les afficher sur la page de profil
    $data = [
        "user_id" => $_SESSION['user_id']
    ];
    $user_request = $database->prepare('SELECT user_name, user_nickname, user_pic FROM user WHERE user_id = :user_id');

    $user_request->execute($data);
    $_USER = $user_request->fetch(PDO::FETCH_ASSOC);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Profile Page</title>

        <link rel="stylesheet" href="./css/style.css" />

        <script defer src="./js/delete.js"></script>
    </head>

    <body>
        <!-- Récupération du modal de publication et de la sidebar -->
        <?php require_once('./php/modal.template.php') ?>
        <?php require_once('./php/sidebar.template.php') ?>

        <main>
            <section class="section-profile">
                <img src="./images/profile-banner/wallpaperflare.com_wallpaper.jpg" alt="Banner" class="banner" />
                <div class="profile">
                    <a class="exit-container" href="./index.php">
                        <div class="exit">
                            <i class="fi fi-rr-angle-right"></i>
                        </div>
                    </a>
                    <div class="profile-header desktop">
                        <img class="profile-pp" src="<?= $_USER["user_pic"] ?>" alt="🖼️" />
                        <div>
                            <h2>
                                <?= $_USER["user_name"] ?>
                            </h2>
                            <h3>@
                                <?= $_USER["user_nickname"] ?>
                            </h3>
                        </div>
                        <button class="config">Modifier le profil</button>
                    </div>
                    <div class="profile-header phone">
                        <div class="profile-top">
                            <img class="profile-pp" src="./images/pp/PPLou.png" alt="Photo de profil" />
                            <button class="config">Modifier le profil</button>
                        </div>
                        <div class="profile-bottom">
                            <h2>
                                <?= $_USER["user_name"] ?>
                            </h2>
                            <h3>@
                                <?= $_USER["user_nickname"] ?>
                            </h3>
                        </div>
                    </div>
                    <p>
                        Passionné de jeux vidéo en tout genre, et gros amateur de
                        bouffe<br />Ah, et je stream tous les deux jours, passe donc
                        dire bonjour sur la chaîne ! (twitch.tv/JusteLouca) :)
                    </p>

                    <!-- Récupération des posts -->
                    <?php require_once('./php/posts/profile-posts.template.php') ?>
                </div>
            </section>
        </main>
        <div class="overlay-delete delete-hidden">
            <div class="delete-modal">
                <h2>Supprimer le post</h2>
                <div class="delete-choice">
                    <div class="non">
                        <h3>Non...</h3>
                    </div>
                    <div class="oui">
                        <h3>Oui !</h3>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php endif; ?>
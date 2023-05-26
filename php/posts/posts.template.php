<div class="post-container">
    <div class="all-publications">
        <script>
            // Déclaration d'une variable permettant d'
            let buttonText;
        </script>
        <?php
        // Boucle foreach qui permet d'afficher chaque post séparément
        foreach ($posts as $post) { ?>
            <?php
            // Association des posts aux utilisateurs via l'association du post_author_id au user_id
            $post_author_id = $post['post_author_id'];
            $usertopost_request = $database->prepare('SELECT user_name, user_nickname, user_pic FROM user WHERE user_id = ' . $post_author_id . '');
            $usertopost_request->execute();
            $_AUTHOR = $usertopost_request->fetch(PDO::FETCH_ASSOC);

            // Variable permettant à la publication d'avoir la classe correspondant à son tag
            $tag_class = $post['post_tag'];
            ?>
            <div class="publication <?= $tag_class ?>">
                <div class="publication-main">
                    <div class="publication-header">
                        <a href="./other-profile.php?user_nickname=<?= $_AUTHOR["user_nickname"] ?>">
                            <img class="pp" src="<?= $_AUTHOR["user_pic"] ?>" />
                        </a>
                        <div class="publication-info">
                            <a href="./other-profile.php?user_nickname=<?= $_AUTHOR["user_nickname"] ?>">
                                <div class="publication-user-info">
                                    <h2>
                                        <?= $_AUTHOR["user_name"] ?>
                                    </h2>
                                    <div class="div-handle">
                                        <h3>@
                                            <?= $_AUTHOR["user_nickname"] ?>
                                        </h3>
                                        <h3>-</h3>
                                        <h3>
                                            <?= date("d/m/Y", strtotime($post['post_date'])) .
                                                " à " . date("H:i", strtotime($post['post_date'])); ?>
                                        </h3>
                                    </div>
                                </div>
                            </a>
                            <script>
                                buttonText = document.querySelector(".modal > .tags > .<?= $tag_class; ?>").name;
                            </script>
                            <button class="tag desktop <?= $tag_class ?>"><?php echo "<script>document.write(buttonText);</script>" ?></button>
                        </div>
                    </div>
                    <div class="publication-content">
                        <button class="tag phone <?= $tag_class ?>"><?php echo "<script>document.write(buttonText);</script>" ?></button>
                        <p>
                            <?= $post["post_content"] ?>
                        </p>

                        <!-- Apparition de l'image uniquement si l'utilisateur a choisi d'en poster une -->
                        <?php if ($post['post_pic']): ?>
                            <img src="<?= "./imagespost/" . $post["post_pic"] ?>" alt="🖼️" />
                        <?php endif; ?>
                        <!-- <img src="./images/images-post/avatar.jpg" alt="🖼️" /> -->
                    </div>
                </div>  
                <!-- Apparition d'un icône de poubelle uniquement s'il s'agit du post de l'utilisateur -->
                <?php if ($_USER == $_AUTHOR): ?>
                    <img class="poubelle" src="./images/icons/icons-profile/poubelle.png" alt="🗑️" />
                    <div class="delete-overlay delete-hidden">
                        <div class="delete-modal">
                            <h2>Supprimer le post ?</h2>
                            <div class="delete-choice">
                                <button class="non">
                                    Non...
                                </button>
                                <form action="./index.php" method="POST" class="suppres-hidden">
                                    <input type="hidden" name="form" value="formulaire_suppression_post">
                                    <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                                    <input type="submit" value="Oui !">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php
        }
        ?>
        <div class="publication tag-9">
            <div class="publication-main">
                <div class="publication-header">
                    <img class="pp" src="./images/pp/PPLou.png" alt="🖼️" />
                    <div class="publication-info">
                        <h2>Diamond</h2>
                        <div class="div-handle">
                            <h3>@diams</h3>
                            <h3>-</h3>
                            <h3>16mn</h3>
                        </div>
                    </div>
                </div>
                <div class="publication-content">
                    <p> Bon... J'ai craqué, c'est parti pour 3h40 de plaisir ! </p>
                    <img src="./images/images-post/avatar.jpg" alt="🖼️" />
                </div>
            </div>
        </div>
    </div>
</div>
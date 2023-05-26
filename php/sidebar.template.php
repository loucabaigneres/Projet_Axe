<div class="sidebar-overlay active">
    <nav class="sidebar">
        <!-- Affichage d'une sidebar différente si l'utilisateur est connecté ou non -->
        <?php if ($_USER != null): ?>
            <div class="sidebar-profile">
                <a href="./profile.php">
                    <img class="pp-sidebar" src="<?= $_USER["user_pic"] ?>" alt="🖼️" />
                    <!-- <img
                    class="pp-sidebar"
                    src="./images/pp/PPLou.png"
                    alt="🖼️"
                /> -->
                </a>
                <div class="profile-info">
                    <h3>Connecté en tant que</h3>
                    <h2>
                        <?= $_USER["user_name"] ?>
                    </h2>
                    <h3>@
                        <?= $_USER["user_nickname"] ?>
                    </h3>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li>
                        <a href="./index.template.php">
                            <div class="menu-list">
                                <img class="icons" src="./images/icons/icons-sidebar/maison.png" alt="🏠">
                                <h2>Accueil</h2>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="menu-list">
                                <img class="icons" src="./images/icons/icons-sidebar/parametres.png" alt="⚙️">
                                <h2>Paramètres</h2>
                            </div>
                        </a>
                    </li>
                </ul>
                <span>
                    <a href="./php/logout.php">
                        <div class="menu-list" action="./php/logout.php">
                            <img id="icons-disconnect" src="./images/icons/icons-sidebar/deconnexion.png" alt="🔚">
                            <h3 id="quit">Déconnexion</h3>
                        </div>
                    </a>
                </span>
            </div>
        <?php else: ?>
            <div class="sidebar-profile">
                <img class="pp-sidebar" src="./images/icons/icons-sidebar/default-rami.png" alt="🖼️" />
                <div class="profile-info">
                    <h4>Créez un compte ou connectez-vous pour accéder à l'entièreté des fonctionnalités de
                        <strong>MicroMovie</strong>.
                    </h4>
                    <a href="./pages/register/register.html">
                    </a>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li>
                        <a href="./pages/register/register.html">
                            <div class="menu-list">
                                <img class="icons" src="./images/icons/icons-sidebar/creation.png" alt="🏠">
                                <h2>Créer un compte</h2>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="./pages/login/login.html">
                            <div class="menu-list">
                                <img class="icons" src="./images/icons/icons-sidebar/connexion.png" alt="🏠">
                                <h2>Se connecter</h2>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="./index.template.php">
                            <div class="menu-list">
                                <img class="icons" src="./images/icons/icons-sidebar/maison.png" alt="🏠">
                                <h2>Accueil</h2>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="menu-list">
                                <img class="icons" src="./images/icons/icons-sidebar/parametres.png" alt="⚙️">
                                <h2>Paramètres</h2>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
    </nav>
</div>
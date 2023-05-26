<!-- Back-end du formulaire d'inscription -->
<?php
require_once '../../conf/database.php';

if (isset($_POST['create'])) {

    // Verification des champs
    if (empty($_POST['user_name']) or empty($_POST['user_nickname']) or empty($_POST['user_mail']) or empty($_POST['user_password']) or empty($_POST['user_pic'])) {
        echo "Veuillez remplir tous les champs";
        die();
    }

    // Transformation des données
    $user_name = htmlspecialchars($_POST['user_name']);
    $user_nickname = htmlspecialchars($_POST['user_nickname']);
    $user_mail = htmlspecialchars($_POST['user_mail']);
    // $user_password = sha1($_POST['user_password']);
    $user_password = password_hash($_POST['user_password'], PASSWORD_ARGON2ID);
    $user_pic = htmlspecialchars($_POST['user_pic']);

    $data = [$user_name, $user_nickname, $user_mail, $user_password, $user_pic];

    // Ajout dans la base de données
    $user_insert = $database->prepare('INSERT INTO user(user_name, user_nickname, user_mail, user_password, user_pic)VALUES(?, ?, ?, ?, ?)');
    $user_insert->execute($data);

    //Vérification de l'identifiant de l'utilisateur
    $last_id = $database->lastInsertId();

    // Tout a été vérifié, on enregistre une session
    $_SESSION['user_id'] = $last_id;
    header('Location: ../../index.template.php');
}
?>
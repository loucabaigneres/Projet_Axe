<!-- Back-end du formulaire d'inscription -->
<?php
if (isset($_POST['connect'])) {

    // Vérification des champs
    if (empty($_POST['user_mail']) or empty($_POST['user_password'])) {
        echo "Veuillez compléter tous les champs...";
        die();
    }

    require_once '../../conf/database.php';

    // Transformation des données
    $user_mail = htmlspecialchars($_POST['user_mail']);
    $user_password = $_POST['user_password'];
    $data = ["user_mail" => $user_mail];

    // Récupération dans la base de données
    $user_insert = $database->prepare('SELECT * FROM user WHERE user_mail = :user_mail');
    $user_insert->execute($data);
    $user_inserted = $user_insert->fetch(PDO::FETCH_ASSOC);

    // Vérification de la présence d'utilisateurs
    if (!$user_inserted) {
        echo "Votre adresse mail et/ou mot de passe est/sont incorrect(s).";
        die();
    }

    if (password_verify($user_password, $user_inserted['user_password'])) {

        // Tout a été vérifié, on enregistre une session
        $_SESSION['user_id'] = $user_inserted['user_id'];
        header('Location: ../../index.template.php');
    } else {
        echo "Le mot de passe est incorrect.";
        die();
    }
}
?>
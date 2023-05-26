<?php
// Mise en place de la session de l'utilisateur
if (isset($_SESSION["user_id"])) {
    $data = [
        "user_id" => $_SESSION['user_id']
    ];

    $user_request = $database->prepare('SELECT user_name, user_nickname, user_pic FROM user WHERE user_id = :user_id');

    $user_request->execute($data);
    $_USER = $user_request->fetch(PDO::FETCH_ASSOC);
} else {
    $_USER = null;
}
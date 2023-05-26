<?php
require_once('./conf/database.php');
require_once('./conf/session.php');

// Back-end de classement des posts
$request = $database->prepare("SELECT * FROM post ORDER BY post_date DESC");
$request->execute();
$posts = $request->fetchAll(PDO::FETCH_ASSOC);


// Back-end de recherche d'un post
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (!empty($_GET['recherche'])) {
        $data = [
            "recherche" => "%" . $_GET['recherche'] . "%",
        ];

        $request_search = $database->prepare("SELECT * FROM post WHERE post_content LIKE :recherche");
        $request_search->execute($data);
        $posts = $request_search->fetchAll(PDO::FETCH_ASSOC);
    }
}


// Back-end de création d'un post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_USER != null) {
        if (isset($_POST['form']) && $_POST['form'] === "formulaire_ajout_post") {
            if (!empty($_POST['post_content'] && !empty($_POST['post_tag']))) {
                $post_content = $_POST['post_content'];
                $post_tag = $_POST['post_tag'];
                $post_pic = $_FILES['post_pic'];

                if (filesize($post_pic["tmp_name"]) != 0):
                    // Vérification de la taille du fichier
                    $maxSize = 2097152; // 2 Mo
                    if (filesize($post_pic["tmp_name"]) > $maxSize) {
                        $fileSizeError = "Fichier dépassant la limite autorisée (2mo).";
                        // echo "Fichier dépassant la limite autorisée (2mo).";
                        return;
                    }

                    $uniqueName = uniqid() . '_' . $post_pic['name'];
                    // Déplacement de l'image dans un dossier
                    move_uploaded_file(
                        // Localisation temporaire de l'image
                        $post_pic["tmp_name"],

                        // Nouvelle localisation de l'image
                        __DIR__ . "/imagespost/" . $uniqueName
                    );
                else:
                    // Donne une valeur nulle à la donnée post_pic si aucune image n'est postée
                    $uniqueName = null;
                endif;

                $data = [
                    "user_id" => $_SESSION['user_id'],
                    "post_content" => $post_content,
                    "post_tag" => $post_tag
                ];

                $request_insert = $database->prepare("INSERT INTO post (post_author_id, post_content, post_tag, post_pic, post_date) VALUES (:user_id, :post_content, :post_tag, '$uniqueName', NOW())");
                $post_inserted = $request_insert->execute($data);
                header("Location: ./index.template.php");
                die();
            }
        } else {
            echo "Veuillez compléter tous les champs...";
        }
    } else
        $notconnected = true;
}

// Back-end de suppression d'un post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['form']) && $_POST['form'] === "formulaire_suppression_post") {
        if (!empty($_POST['post_id'])) {
            $data = [
                "post_id" => $_POST['post_id']
            ];

            $request_delete = $database->prepare("DELETE FROM post WHERE post_id = :post_id");
            $post_deleted = $request_delete->execute($data);
            header('Location: ./index.template.php');
        }
    }
}


// // Back-end de classement des users

// $request = $database->prepare("SELECT * FROM user ORDER BY user_nickname DESC");
// $request->execute();
// $users = $request->fetchAll(PDO::FETCH_ASSOC);


// // Back-end de recherche d'un user

// if ($_SERVER['REQUEST_METHOD'] == "GET") {
//     if (!empty($_GET['recherche'])) {
//         $data = [
//             "recherche" => "%" . $_GET['recherche'] . "%",
//         ];

//         $request_search = $database->prepare("SELECT * FROM user WHERE user_nickname LIKE :recherche");
//         $request_search->execute($data);
//         $users = $request_search->fetchAll(PDO::FETCH_ASSOC);
//     }
// }
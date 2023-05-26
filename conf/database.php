<?php
// Déclaration de la base de données
$host = "localhost";
$db = "axe";
$user = "root";
$pass = "";

// Connexion à la base de données
try {
    $database = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $ex) {
    die("Erreur :" . $ex->getMessage());
}
// Déclaration de démarrage de la session
session_start();
?>
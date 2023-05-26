<?php
// Back-end de déconnexion de l'utilisateur
session_start();
session_destroy();
header('Location: ../index.template.php');
?>
<?php 
    session_start();

    // Vérification si l'utilisateur est authentifié
    // Si la variable globale "$_SESSION['auth'] n'est 
    // pas déclaré ...
    if( !isset($_SESSION['auth']) ) {

        // Redirection sur la page de connexion
        header('Location: login.php');

    }
?>
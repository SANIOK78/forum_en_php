<?php 

    // Configuration de la connexion a la BD
    try {

        $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root');
    

    } catch( Exception $e ) {

        die('Erreur de connexion a la BD : '.$e->getMessage());
    }
?>

<!-- PDO =< une class créé pour faciliter les requêtes SQL vers la BD -->
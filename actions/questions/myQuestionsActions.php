<!-- 
    Logique pour recupérer toutes les questions de
    l'utilisateur qui possed l'identifiant " SESSION['id'] "
-->
<?php
    // Ouverture de la session
    session_start();

    // importation de la connexion DB
    require('actions/connectDB.php');

    // Requête pour récupérer tous les questions
    $getAllMyQuestions = $bdd -> prepare('SELECT id, titre, description, contenu FROM questions
                                    WHERE id_auteur= ?
                                    ORDER BY id DESC   
                                ');
    // Execution requête (identifaiant de l'utilisateur connecté)                          
    $getAllMyQuestions -> execute(array($_SESSION['id']));
?>
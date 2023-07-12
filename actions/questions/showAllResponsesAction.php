
<!-- Système permettant d'afficher toutes les reponses liés 
a une question  -->
<?php 
    require('actions/connectDB.php');

    // Recup des tous les reponses d'une publication
    // Select données pour chaque reponse de la table 
    // "reponses" qui possede comme "id_question = ?" 
    // => ID publication passé en param URL
    $getAllResponsesOfOneQustion = $bdd -> prepare(
        'SELECT id_auteur, pseudo_auteur, id_question, contenu
        FROM reponses
        WHERE id_question = ?  
        ORDER BY id DESC  
    ');

    // Execution de la requête. Recup "ID de la question" depuis 
    // param URL
    $getAllResponsesOfOneQustion -> execute(array($_GET['id']));

?>
<!--SYSTEME Publication Question -->
<?php 
    // session_start();

    // 1. Importation de la BD
    require('actions/connectDB.php');

    // Verif si user a cliqué sur bouton "Publier une question"
    if(isset($_POST['publish'])) {

        // Vérif si les champs sont bien remplis
        if( !empty($_POST['titreQu']) && !empty($_POST['descriptionQu']) &&  !empty($_POST['contenuQu'])){

            // Stockage des données récupérés
            $question_titre = htmlspecialchars($_POST['titreQu']);
            $question_description = nl2br(htmlspecialchars($_POST['descriptionQu']));
            $question_contenu = nl2br(htmlspecialchars($_POST['contenuQu']));

            // La date de publication (date/mois/Année)
            $question_Date = date('d/m/Y');
            $question_author_id = $_SESSION['id']; //ID de l'auteur de la publication
            $question_author_pseudo = $_SESSION['pseudo']; //pseudo de l'auteur 

            // Insertion du contenu/questions dans la BD( sur le site)
            $insertQuestionOnDB = $bdd -> prepare('INSERT INTO questions(titre, description, contenu, id_auteur, pseudo_auteur, date_publication)
                                                VALUE (?, ?, ?, ?, ?, ?)
                                            ');
            // execution de la requête
            $insertQuestionOnDB -> execute(
                array(
                    $question_titre, 
                    $question_description, 
                    $question_contenu, 
                    $question_author_id, 
                    $question_author_pseudo,
                    $question_Date, 
                )
            );
            // Message succes
            $successMsg = "Question enregistré avec succes !!!";

        } else {
            
            $errorMsg = "Veillez compléter tous les champs";
        }
    }
?>

<!--
    "nl2br" => function PHP pour prendre en compte les saute de lines, plusieurs paragraphes
    dans les champs "textarea".
    "nl2br" => Cette function va transformer les saute des lines en balise <br /> 
-->
<!-- Logique pour recupérer la qestion a modifier grâce a son ID -->
<?php 

    // session_start();
    require('actions/connectDB.php');

    // Vérification si l'ID a été renseigné dans les paramétres URL
    if(isset($_GET['id']) && !empty($_GET['id'])) {

        // On va stoker cette "$_GET['id']
        $idQuestion = $_GET['id'];

        // Vérification si la question existe sur le site(en BD)
        // On selection tous le infos de la question qui correspond a l'id récupéré 
        // dans les parametre URL
        $checkQuestionExists = $bdd -> prepare('SELECT * FROM questions WHERE id = ?');
                                                                                   
        // Execution de la requete
        $checkQuestionExists -> execute(array($idQuestion));

        // Si la question est trouvé
        if($checkQuestionExists -> rowCount() > 0 ) {

            // Vérification si la personne connecté c'est l'AUTEUR de la publication
            $qustionAuthorInfos = $checkQuestionExists->fetch();
            // si l'ID auteur recupéré correspond avec l'ID de la personne connecté(authentifié)
            if($qustionAuthorInfos['id_auteur'] == $_SESSION['id']) {

                // récup données de la question
                $question_title = $qustionAuthorInfos['titre'];
                $question_description = $qustionAuthorInfos['description'];
                $question_content = $qustionAuthorInfos['contenu'];
                
                // pour enlever les balise <br/> 
                $question_description = str_replace("<br />", '', $question_description );
                $question_content = str_replace("<br />", '', $question_content );

            } else { //si ce n'est pas la m^me personne
                $errorMsg = "Vous n'avez pas des droits sur cette publication."; 
            }

        } else {   //si pas de question trouve
            $errorMsg = "Identifiant question innexistante. ";
        }

    } else {
        $errorMsg = "Aucune question n'a été trouvé. ";
    }

?>

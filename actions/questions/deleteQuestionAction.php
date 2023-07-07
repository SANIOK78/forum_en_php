
<!-- Logique pour SUPPRIMER une question -->
<?php 
    // Vérification si user est authentifié sur le site
    // pour pouvoir supprimer une publication qui lui appartient
    session_start();
    // si la SESSION['auth'] n'est pas déclaré...redirection
    if( !isset($_SESSION['auth'])) {
        header('Location: ../../login.php');
    }
    require('../connectDB.php');

    // Vérif si l'ID de la question est passé dans l'URL et s'il n'est pas vide
    if(isset($_GET['id']) && !empty($_GET['id'])) {

        $idQuestionDB = $_GET['id'];  

        // Verif si l'ID rentré par utilisateur existe en BD
        $checkIfQuestionExiste = $bdd -> prepare('SELECT id_auteur FROM questions WHERE id = ?');
                                        
        // Execution de la requête
        $checkIfQuestionExiste -> execute(array($idQuestionDB));

        // vérif si la question existe : //NB données > 0
        if($checkIfQuestionExiste -> rowCount() > 0) {  

            //Récuperation de tous les données de la requête 
            $usersInfos = $checkIfQuestionExiste -> fetch();
            // Vérif si user qui veut supprimer la question est l'auteur
            if($usersInfos['id_auteur'] == $_SESSION['id'] ) {

                //Requête pour supprimer la question : Suprimer depuis la table "questions"
                // la publication qui possede "id" rentré par user (depuis URL)
                $deleteQuestion = $bdd -> prepare('DELETE FROM questions WHERE id = ?');
                $deleteQuestion -> execute(array($idQuestionDB)); //id de la question

                // redirection sur la page precedente
                header('Location: ../../myProfil.php');

            } else {
                echo "Vous n'avez pas des droits sur cette publication !!!";
            }
        } else {
            echo "Pas de question avec cet identifiant";
        }
    } else{
        echo "Aucune question trouvé !!!";
    }
?>   

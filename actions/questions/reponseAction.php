<!-- Logoque pour enregistrer les reponses en BD -->
<?php 
    // session_start();

    // importation connexion a la BD
    require('actions/connectDB.php');

    // Vérif si click sur bouton "Valider" 
    if(isset($_POST['validate'])) {

        // Verif si la variable "comment" n'est pas vide
        if( !empty($_POST['comment'])) {

            // On va stoker cette reponse
            $reponseUser = nl2br(htmlspecialchars($_POST['comment']));

            // Insertion de la reponse en BD
            $insertReponse = $bdd -> prepare(
                'INSERT INTO reponses(id_auteur, pseudo_auteur, id_question, contenu)
                VALUES(?, ?, ?, ?)                                 
            ');
            // execution requete
            $insertReponse -> execute(array(
                $_SESSION['id'],    // session auteur connecté, qui va inserer la reponse
                $_SESSION['pseudo'],  // pseudo auteur connecté
                $_GET['id'],        // ID de la question recupéré depuis URL
                $reponseUser       // le contenu de la reponse
            ));


        } else {
            echo "Pas de commentaires pour cette publication";
        }

    }

?>
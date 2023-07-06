<!-- La logique pour modifier / mettre a jour
les donnée du formulaire  -->
<?php  
    // session_start();

    // Vérif si user clik sur bouton "Modifier la question"
    if(isset($_POST['publish'])) {

        // Vérif si tous les champs sont remplis
        if( !empty($_POST['titreQu']) && !empty($_POST['descriptionQu']) && !empty($_POST['contenuQu'])) {

            // Recup des donnés a faire passer dans la requête 
            $newQues_title = htmlspecialchars($_POST['titreQu']);
            $newQues_description = nl2br(htmlspecialchars($_POST['descriptionQu']));
            $newQues_content = nl2br(htmlspecialchars($_POST['contenuQu']));

            // Enregistrement, mise a jour des modifications en BD => Mettre a jour la table
            // "questions", le titre, description, contenu qui pessede l'ID correspondant a 
            // l'ID récupéré dans paramétres URL
            $editQuestionOnDB = $bdd -> prepare('UPDATE questions 
                                            SET titre=?, description=?, contenu=?
                                            WHERE id = ?
                                        ');
            // Execution de la requête, avec comme paramétre le 'ID' depuis URL
            $editQuestionOnDB -> execute(
                array(
                    $newQues_title,
                    $newQues_description,
                    $newQues_content,
                    $idQuestion
                    // $_GET['id']
                )
            );

            // redirection vers la page d'affichage des questions d'user 
            header('Location: myProfil.php');

        } else {
            $errorMsg = "Veillez remplir tous les champs";
        }
    }
?>
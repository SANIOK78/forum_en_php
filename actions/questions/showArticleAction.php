<?php 
    // Inport connexion DB
    require('actions/connectDB.php');

    // Vérif si la variable 'id' est déclaré et pas vide
    // S'il y a un identifiant rentré en parametre URL et si cet 'ID' a une valeur
    if(isset($_GET['id']) && !empty($_GET['id'])) {

        $idOfArticle = $_GET['id'];

        // Verif si "ID" récupéré depuis URL correspond avec une 
        // des publications dans BD
        $checkIfArticleExists = $bdd ->prepare('SELECT * FROM questions WHERE id = ? ');
                                                                   
        // Execution de la requete, pour récup dans 'tab' la question correspondante
        // avec l'id rentré en parametre
        $checkIfArticleExists -> execute(array($idOfArticle));

        // Vérif si on a pu récupérer une question
        if($checkIfArticleExists -> rowCount() > 0 ) {  //pas vide, donc question recupéré

            // Affichage des données de cette question( fetch() = recup tous infos )
            $questionInfos = $checkIfArticleExists -> fetch();

            // Stokage data de la question
            $question_title = $questionInfos['titre'];
            $question_description = $questionInfos['description'];
            $question_contenu = $questionInfos['contenu'];
            $question_auteurID = $questionInfos['id_auteur'];
            $question_pseudoAuteur = $questionInfos['pseudo_auteur'];
            $question_datePublication = $questionInfos['date_publication'];


        } else {  //pas de question récupéré
            $errorMsg = "<p class='text-danger'>Pas de question trouvé</p>";
        }

    } else {
        $errorMsg = '<p class="text-danger">Aucune correspondance !!!</p>';
    }
?>
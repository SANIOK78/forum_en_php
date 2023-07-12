<!-- Logique pour récupérer "un User" en BD   -->
<?php 
    // import Connexion a la BD
    require('actions/connectDB.php');

    // vérif si la variable "ID" existe en param URL
    // ET s'il n'est pas vide (on exige une valeur)
    if (isset($_GET['id']) && !empty($_GET['id'])) {

        // on stock ID de l'utilisateur
        $idUser = $_GET['id'];

        // Verif dans BD s'il y a un utilisateur correspondant avec 
        // identifiant rentré en param URL
        $checkIfUserExists = $bdd -> prepare('SELECT pseudo, nom, prenom 
                                        FROM users WHERE id = ? '
                                    );
        $checkIfUserExists -> execute(array($idUser));

        // S'il y une correspondance 
        if($checkIfUserExists -> rowCount() > 0 ) {
            // récup des toutes les données trouvé par la requête
            $userInfos = $checkIfUserExists -> fetch();

            // Stockage des infos trouvé
            $userPseudo = $userInfos['pseudo'];
            $userLastname = $userInfos['nom']; //en BD
            $userFirstname = $userInfos['prenom'];

            // Récup des tous les publications en BD qui ont "id_auteur"
            // correspond avec l'ID auteur récupéré depuis params URL
            $getQuestions = $bdd -> prepare('SELECT * FROM questions
                                        WHERE id_auteur = ?
                                        ORDER BY id DESC
                                    ');
            // Execution requête
            $getQuestions -> execute(array($idUser));
       

        } else {
            $errorMsg = "Utilisateur inexistant !!!";
        }

    } else {
        $errorMsg = "Aucun utilisateur trouvé";
    }
?>
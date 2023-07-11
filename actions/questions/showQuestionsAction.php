<!-- Logique pour RECHERCHER un titre -->
<?php 

    // import connexion a la bd
    require('actions/connectDB.php');

  // Recupérer les qustions par defaut sans la recherche
    $getAllQuestion = $bdd -> query('SELECT * FROM questions
                                ORDER BY id DESC
                                LIMIT 0, 5
                            ');
    
    // Vérif si une recherche a été rentré par user (en param URL)
    if(isset($_GET['search']) && !empty($_GET['search'])) {

        // stokage de la recherche d'utilisateur
        $userSearch = $_GET['search'];

        // Recuperer les champs suivante da la table "questions"
        //  qui possed le titre qui se ressembe a la recherche 
        // "LIKE = $userSearch"
        $getAllQuestion = $bdd -> query('SELECT * FROM questions
                                        WHERE titre
                                        LIKE "%'.$userSearch.'%"                                       
                                        ORDER BY id DESC  
                                    ');
    }

?>
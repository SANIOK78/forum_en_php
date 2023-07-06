<?php 
    require('actions/questions/myQuestionsActions.php');
    // Securité =>redirecton user non authentifié sur "login" 
    require('actions/users/securityAction.php') ;
?>

<!DOCTYPE html>
<html lang="fr">
    <?php include 'commons/head.php'; ?>
    
    <body>
        <?php include 'commons/navbar.php'; ?>
        <div class="container my-3">
            <h1 class='text-primary text-center my-2'>
                Mon Profil
            </h1>

            <h4 class="my-2">Mes questions :</h4>

            <!-- Affichage des questions recupéré dapuis BD -->
            <?php 
                // Pour chaque question, on recup chaque données
                while( $question = $getAllMyQuestions->fetch() ) {  ?>
                    <!-- on va creer un "card bootstrap" -->
                    <div class="card my-3">
                        <h5 class="card-header">
                            <?php echo $question['titre']; ?>
                        </h5>

                        <div class="card-body">
                            <p class="card-text">
                                <?php echo $question['description']; ?>
                            </p>
                            <hr />
                            <p class="card-text">
                                <?php echo $question['contenu']; ?>
                            </p>
                            <a href="#" class="btn btn-success">Acceder à l'article</a>
                            <a href="#" class="btn btn-warning">Modifier à l'article</a>
                        </div>
                    </div>
                

                <?php }                            
            ?>
        </div>

       
        
        <?php include 'commons/footer.php'; ?>
    </body>
</html>
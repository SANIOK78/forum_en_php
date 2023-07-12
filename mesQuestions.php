<?php 
    // Securité =>redirecton user non authentifié sur "login" 
    require('actions/users/securityAction.php') ;
    require('actions/questions/myQuestionsActions.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <?php include 'commons/head.php'; ?>
    
    <body>
        <?php include 'commons/navbar.php'; ?>
        <div class="container my-3">
            <h1 class='text-primary text-center my-2'>Mes questions :</h1>
            <!-- Affichage des questions recupéré dapuis BD -->
            <?php 
                // Pour chaque question, on recupère chaque données
                while( $question = $getAllMyQuestions -> fetch() ) {  ?>
                    <!-- on va creer un "card bootstrap" -->
                    <div class="card my-4 border border-primary card-shadow">

                        <h2 class='card-header'><?= $question['titre'] ?></h2>
                                                       
                        <div class="card-body">
                            <p class="card-text">  <?php echo $question['description']; ?> </p>                           
                            <hr />
                            <p class="card-text">
                                <?php echo $question['contenu']; ?>
                            </p>

                            <a href="article.php?id=<?php echo $question['id'] ?>" class="btn btn-success">
                                Acceder à la question
                            </a>

                            <!-- On envoit dans les param URL l'id de la question a modifier -->
                            <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">
                                Modifier la question
                            </a>

                            <!-- On envoit dans les param URL l'id de la question a supprimer -->
                            <a 
                                href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>"
                                class="btn btn-danger my-1"
                            >
                                Supprimer la question
                            </a>
                        </div>
                    </div>               
                <?php }                            
            ?>
        </div>       
        <?php include 'commons/footer.php'; ?>
    </body>
</html>
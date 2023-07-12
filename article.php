<!-- Fichier qui va afficher un seul article -->
<?php 
    session_start();
    require('actions/questions/showArticleAction.php');
    require('actions/questions/reponseAction.php');
    require('actions/questions/showAllResponsesAction.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <?php include 'commons/head.php' ?>
    <body>
        <?php include 'commons/navbar.php' ?>

        <div class="container my-5">
            <?php 
                // affichage d'erreur s'il en a
                if(isset($errorMsg)){ echo $errorMsg ;}
            // Vérif si la variable ...existe 
            if(isset($question_datePublication)) { ?>

              <!-- Affichage publication recupérés -->
                <div class="border border-success rounded p-3">
                    <h1 class="text-primary"><?php echo $question_title ?> </h1>
                    <hr>

                    <h3><?php echo $question_description; ?></h3>
                    <p><?php echo $question_contenu; ?></p>
                    <hr>

                    <div class="d-flex justify-content-between">
                        <strong><?php echo $question_pseudoAuteur; ?></strong>
                        <p><?php echo $question_datePublication; ?></p>
                    </div>                
                </div>
             <!-- Espace COMMENTAIRES -->
                <section class="border border-primary rounded p-3 my-4" >

                    <form action="#" method="POST" class="form-group">

                        <label for="comment" class="form-label">Vos commentaires :</label>
                        <textarea name="comment" id="comment" class="form-control"></textarea>

                        <button type="submit" name="validate" class="btn btn-primary btnPerso my-2">
                            Validez
                        </button>

                    </form>
                </section>

                <!-- Espace pour afficher les reponses/ommentaire lié a la question -->
                <div class="my-3">
                    <h2 class="text-primary mb-2">Merci pour vos réponses </h2>

                    <?php 
                        while($reponse = $getAllResponsesOfOneQustion -> fetch()) { ?>

                            <div class="card my-3">
                                <div class="card-header">
                                    <?php echo $reponse['pseudo_auteur'] ?>
                                </div>
                                <div class="card-body">
                                    <?php echo $reponse['contenu'] ?>
                                </div>
                            </div>

                    <?php } ?>
                    
                </div>
            <?php }  ?>                      
        </div>        
        <?php include 'commons/footer.php' ?>
    </body>
</html>
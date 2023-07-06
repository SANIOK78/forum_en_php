<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/getInfosOfEditedQestionAction.php');
    require('actions/questions/editQuestionAction.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <?php include 'commons/head.php'; ?>

    <body>
        <?php include 'commons/navbar.php'; ?> 
        
        <div class="container mt-3">
            <h1 class="text-primary text-center my-3">Modifiez votre question</h1>

            <?php 
                // condition pour afficher un message d'erreur ou succes
                if(isset($errorMsg)) {
                    echo "<p class='text-danger my-2'>".$errorMsg."</p> "; 
                } 
            ?> 
            <?php if(isset($question_content)) { ?>
            
                <form action='#' method="POST" class='shadow-sm rounded p-4 bg_white' >
                
                    <div class="mb-3">
                        <label for="titreQu" class="form-label">Titre de la question</label>
                        <input type="text" class="form-control" name="titreQu" id="titreQu" value="<?php echo $question_title ?>" />
                    </div>

                    <div class="mb-3">
                        <label for="descriptionQu" class="form-label">Description de la question</label>
                        <textarea class="form-control" name="descriptionQu" id="descriptionQu" ><?php echo $question_description ?></textarea>                        
                    </div>

                    <div class="mb-3">
                        <label for="contenuQu" class="form-label">Contenu de la question</label>
                        <textarea class="form-control" name="contenuQu" id="contenuQu" ><?php echo $question_content ?></textarea >                        
                    </div>
                    <button type="submit" class="btn btn-warning btnPerso" name='publish'>
                        Modifier la question
                    </button>
                                
                </form>
            <?php }   ?> 
        </div>

        <?php include 'commons/footer.php'; ?> 
        
    </body>
</html>
<?php 
    // On va inclure la sécurité pour ne pas permettre l'acces 
    // au site si pas authentifié
    require('actions/questions/publishAction.php');
    require('actions/users/securityAction.php');
    
?>

<!DOCTYPE html>
<html lang="fr">

    <?php include 'commons/head.php'; ?>

    <body>
        <!-- NAVIGATION -->
        <?php include 'commons/navbar.php' ; ?>

        <div class="container my-5">

            <form action='#'method="POST" class='shadow-sm rounded p-4 bg_white' >
                <h1 class='text-center text-info'>Formulez votre question</h1>
                <div class="mb-3">
                    <label for="titreQu" class="form-label">Titre de la question</label>
                    <input type="text" class="form-control" name="titreQu" id="titreQu" />
                </div>           
                <div class="mb-3">
                    <label for="descriptionQu" class="form-label">Description de la question</label>
                    <textarea class="form-control" name="descriptionQu" id="descriptionQu"></textarea >
                </div>
                <div class="mb-3">
                    <label for="contenuQu" class="form-label">Contenu de la question</label>
                    <textarea class="form-control" name="contenuQu" id="contenuQu"></textarea >
                </div>
                <button type="submit" class="btn btn-success btnPerso" name='publish'>
                    Publier la question
                </button>

                <?php 
                    // condition pour afficher un message d'erreur ou succes
                    if(isset($errorMsg)) {
                        echo "<p class='text-danger my-2'>".$errorMsg."</p> "; 

                    } else if($successMsg) {
                        echo "<p class='text-success my-2'>".$successMsg."</p> ";
                    }
                ?> 
                            
            </form>
        </div>
    

        <?php include 'commons/footer.php' ; ?>
    </body>
</html>
<!-- Fichier qui va afficher un seul article -->
<?php 
    session_start();
    require('actions/questions/showArticleAction.php');
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

                    <!-- on affiche les données recupérés -->
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
                <?php }
            ?>           
        </div>
        
        <?php include 'commons/footer.php' ?>
    </body>
</html>
<?php 
    require('actions/signupAction.php');
?>

<!DOCTYPE html>
    <html lang="fr">

    <?php include 'commons/head.php' ?>


    <body>
        <div class="container my-5">

            <?php 
                if($_SESSION) {
                    echo "<p>Bienvenue <b>".$_SESSION['pseudo']."</b></p> "; 
                } 
            ?> 

            <h1 class='text-primary my-5 text-center'>
                Page Accueil
            </h1>

        </div>


        <?php include ('commons/footer.php') ?>
    </body>
</html>
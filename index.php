<?php 
    require('actions/securityAction.php');
?>

<!DOCTYPE html>
    <html lang="fr">

    <?php include 'commons/head.php' ?>


    <body>
        <div class="container my-5">

           <?php 
            if(isset($_SESSION['pseudo'])) {
                echo "<p>Bienvenue <b>".$_SESSION['pseudo']."</b></p>";
            }  
           ?>
            <hr>   
             

            <h1 class='text-primary my-5 text-center'>
                Page Accueil
            </h1>

            <a href="actions/logoutAction.php">
                Deconnexion
            </a>
        </div>


        <?php include ('commons/footer.php') ?>
    </body>
</html>
<?php 
    // session_start();
    require('actions/users/securityAction.php');
    
?>

<!DOCTYPE html>
    <html lang="fr">

    <?php include 'commons/head.php' ; ?>


    <body>
        <!-- NAVIGATION -->
        <?php include 'commons/navbar.php' ; ?>

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

            <a href="actions/users/logoutAction.php">
                Deconnexion
            </a>
        </div>


        <?php include 'commons/footer.php' ; ?>
    </body>
</html>
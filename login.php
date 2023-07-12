<?php 
    require('actions/users/loginAction.php');
?>

<!DOCTYPE html>
    <html lang="fr">

    <?php include 'commons/head.php'; ?>


    <body>
        <div class="container my-5">

            <form action='#' method="POST" class='shadow rounded p-4 bg_white' >
                <h1 class='text-center text-info mb-4'>Connexion</h1>

                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" name="pseudo" id="pseudo" />
                </div>
               
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password"/>
                </div>

                <button type="submit" class="btn btn-success btnPerso" name='validate'>
                    Se connecter
                </button>

                <p class="my-3">
                    Je n'ai pas de compte, <a href="signup.php"> je m'inscris </a>.
                </p>

                <?php if(isset($errorMsg)) {echo "<p class='text-danger'>".$errorMsg."</p> "; } ?> 
                              
            </form>
        </div>


       <?php include 'commons/footer.php'; ?>

    </body>
</html>
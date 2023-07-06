<?php 
    require('actions/users/signupAction.php');
?>

<!DOCTYPE html>
    <html lang="fr">

    <?php include 'commons/head.php'; ?>


    <body>
        <div class="container my-5">

            <?php if(isset($userInfos)) {echo "<p>Bienvenue <b>".$userInfos['pseudo']."</b></p> "; } ?> 

            <form action='#'method="POST" class='shadow-sm rounded p-4 bg_white' >
                <h1 class='text-center text-info'>Inscription</h1>
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" name="pseudo" id="pseudo" />
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" />
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="firstname" name='firstname' />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" />
                </div>
                <button type="submit" class="btn btn-success btnPerso" name='validate'>
                    S'inscrire
                </button>

                <p class='my-3'>
                    J'ai déjà un compte, <a href="login.php"> je me connecte.</a>
                </p>

                <?php if(isset($errorMsg)) {echo "<p class='erreur'>".$errorMsg."</p> "; } ?> 
                              
            </form>
        </div>


       <?php include 'commons/footer.php'; ?>

    </body>
</html>
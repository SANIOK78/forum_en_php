<?php 
    session_start(); 
    require('actions/users/userProfilAction.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <?php include 'commons/head.php'; ?>

    <body>
        <?php include 'commons/navbar.php'; ?>

        <div class="container my-3">

            <?php 
                if(isset($errorMsg)) {
                    echo "<p class='text-danger'>".$errorMsg."</p>" ;
                }

            if(isset($getQuestions)) { ?>

                <div class="my-5">
                    <h2 class="text-center text-primary"> Les publications de @<?= $userPseudo ?> </h2>
                    <hr>
                    <h4> <?=  $userLastname.' '. $userFirstname ?> </h4>
                </div>
               
                <!-- Les publication de "user" -->
                <?php while($publication = $getQuestions -> fetch()) { ?>

                    <div class="card border border-success my-3">

                        <div class="card-header">
                            <h3 class="text-center"><?= $publication['titre'];?></h3>
                        </div>

                        <div class="card-body">
                            <h4 class="text-center"><?= $publication['description'];?></h4>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <h6 class="text-center">
                                Par <?= $publication['pseudo_auteur'];?>
                            </h6>
                            <p>Le <?= $publication['date_publication'];?> </p>
                        </div>

                    </div>

                <?php } ?>                    
            <?php } ?>
        </div>
        <?php include 'commons/footer.php'; ?>
    </body>
</html>
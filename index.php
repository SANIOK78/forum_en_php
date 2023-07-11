<?php 
    session_start();
    require('actions/questions/showQuestionsAction.php');
?>

<!DOCTYPE html>
    <html lang="fr">

    <?php include 'commons/head.php' ; ?>

    <body>
        <!-- NAVIGATION -->
        <?php include 'commons/navbar.php' ; ?>

        <div class="container my-5">
            
            <form action="#" method="GET" >
                <div class="form-group row">

                    <div class="col-8">
                        <input type="search" name="search" class="form-control" 
                            placeholder="Affinez votre recherche"
                        />
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-success">
                            Rechercher
                        </button>
                    </div>
                </div>
            </form>

            <!-- Affichage des données de la requete -->
            <?php 
                // On va boucler sur les resultat de la recherche
                // "$getAllQuestion->fetch()" va recuperer toutes les questions dans un tab[]
                while($question = $getAllQuestion->fetch()) { ?>

                    <div class="card my-3">

                        <div class="card-header">

                            <a href="article.php?id=<?php echo $question['id'] ?> ">

                                <?php echo "<h2>".$question['titre']."</h2>"; ?>
                            </a>

                        </div>

                        <div class="card-body">
                            <?php echo "<h5>".$question['description']."</h5><hr />"; ?>
                            <?php echo "<p>".$question['contenu']."</p>"; ?>
                        </div>

                        <div class="card-footer">
                            <p>
                            Publié par <?php echo "<strong>".$question['pseudo_auteur']."</strong>"; ?>
                            le <?php echo "<strong>".$question['date_publication']."</strong>"; ?>
                            </p>
                        </div>
                    </div>
                    
                <?php }
            ?>
        </div>
        <?php include 'commons/footer.php' ; ?>
    </body>
</html>
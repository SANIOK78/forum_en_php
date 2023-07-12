<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container-fluid ">
        <?php if(isset($_SESSION['auth']) && isset( $_SESSION['pseudo'])) { ?>
            
            <a class="navbar-brand fs-2" href="index.php"><?php echo $_SESSION['pseudo'] ?></a>

        <?php } else { ?>
            <a class="navbar-brand fs-2" href="index.php">@Forum </a>
        <?php } ?>    
                  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">

                <li class="nav-item mx-2">
                    <a class="nav-link fs-5" href="index.php">
                        <u>Accueil</u>
                    </a>
                </li>                
                <li class="nav-item mx-2">
                    <a class="nav-link fs-5" href="publish-question.php">
                        <u>Publier une question</u>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link fs-5" href="mesQuestions.php">
                        <u>Mes questions</u>
                    </a>
                </li>

              <!-- Afficher le bouton "deconnexion" seulement si le user est connecté -->
                <?php if(isset($_SESSION['auth'])) { ?>

                    <li class="nav-item mx-2">
                        <a class="btn btn-outline-dark fs-6" href="actions/users/logoutAction.php">
                            Déconnexion
                        </a>
                    </li>      

                <?php } else { ?>

                    <li class="nav-item mx-2">
                        <a class="btn btn-outline-dark fs-6" href="login.php">
                            Connexion
                        </a>
                    </li>  
                <?php } ?>
                                               
            </ul>
        </div>
    </div>
</nav>
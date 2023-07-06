<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container-fluid ">
        <a class="navbar-brand fs-2" href="index.php">
            <?php if($_SESSION['pseudo']) {echo "<p>".$_SESSION['pseudo']."</p>";} ?>
        </a>
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
                    <a class="nav-link fs-5" href="myProfil.php">
                        <u>myProfil</u>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="btn btn-outline-dark fs-6" href="actions/users/logoutAction.php">
                        Déconnexion
                    </a>
                </li>
                               
            </ul>
        </div>
    </div>
</nav>
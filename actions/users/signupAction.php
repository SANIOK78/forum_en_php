<!-- SYSTEME d'Inscription -->
<?php 
    // Ouverture d'une session
    session_start();
    
    // 1. Connexion a la BD.
    require('actions/connectDB.php');

    // 2.Vérification si le formulaire a été soumit (click button[name='validate'])
    if(isset($_POST['validate'])) {

      // 2.1 Vérif si tous les champs sont remplis
        if(!empty($_POST['pseudo']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['password'])){
            
          //a) récup et stockage des infos
            $userPseudo = htmlspecialchars($_POST['pseudo']);
            $userLastname = htmlspecialchars($_POST['lastname']);
            $userFirstname = htmlspecialchars($_POST['firstname']);
            //b) Recup et chriptage de mot de passe( pwd, Algirithm de Chriptage)
            $userPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
         
           //3. Vérif si l'utilisateur est déjà inscrit sur le site. On appel la 
            $checkIfUserExists = $bdd -> prepare("SELECT pseudo FROM users WHERE pseudo = ? ");
            
           //d) execution de la requête (en fonction du pseude rentré par utilisateur)
            $checkIfUserExists -> execute(array($userPseudo));

           // On verifie si l'utilisateur existe
            if($checkIfUserExists -> rowCount() == 0) {   //si aucun user avec ce pseudo trouvé
                //4. On va inserer dans la BD le user
                $insertUserOnDB = $bdd -> prepare('INSERT INTO users(pseudo, nom, prenom, pwd) VALUES (?, ?, ?, ?)');                                                                                                            
                $insertUserOnDB -> execute(array($userPseudo, $userLastname, $userFirstname, $userPassword));

                // Vu que l'identifiant est unique on va le recupérer pour autentifier le utilisateur
                // Recup l'identifiant de l'utilisateur qui possede le "nom" et "prenom" saisit par l'utilisateur
                $getUserId = $bdd -> prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ? ');
                $getUserId -> execute(array($userLastname, $userFirstname, $userPseudo));

                // On va stoker l'information obtenu 
                $userInfos = $getUserId -> fetch();

                // AUTHENTIFICATION du utilisateur sur le site, RECUP ces données dans variable globale "SESSION"
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['pseudo'] = $userInfos['pseudo'];
                $_SESSION['lastname'] = $userInfos['nom'];
                $_SESSION['firstname'] = $userInfos['prenom'];

                // Redirection vers la page d'accueil
                header('Location: index.php');

            } else {
                $errorMsg = "Ce Pseudo est déjà pris...";
            }
        } else {
            $errorMsg = "Veillez compléter tous les champs...";
        }
    }
?>


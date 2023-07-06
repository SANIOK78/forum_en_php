<!-- SYSTEME DE CONNEXION  -->
<?php 
    // Ouverture d'une session
    session_start();
    
    //1. Importation connexion a la bD
    require('actions/connectDB.php');

    // 2.Vérification si user click sur "button[name='validate']";
    if(isset($_POST['validate'])) {
        // 2.1 Vérif si tous les champs sont remplis
        if(!empty($_POST['pseudo']) && !empty($_POST['password'])) {
            
           // a) Récup et stockage des infos
            $userPseudo = htmlspecialchars($_POST['pseudo']);
            $userPassword = htmlspecialchars($_POST['password']);
        
            //b) Vérif si on trouve en BD un user avec ce "pseudo" et "pwd"
            $chekIfUserExiste = $bdd -> prepare('SELECT * FROM users WHERE pseudo = ? ');
            $chekIfUserExiste -> execute(array($userPseudo));

            //c) Verif si user ("$chekIfUserExiste") existe
            if($chekIfUserExiste -> rowCount() > 0 ) {  // user recupéré

                // stocage des infos recupéré(ID, pseudo, nom, prenom, pwd)
                $userInfos = $chekIfUserExiste -> fetch();

                // * Comparer si les Passwords (en claire et hashé) corresponds 
                if(password_verify($userPassword, $userInfos['pwd'])) {

                    //Si PWD correct => AUTHENTIFICATION user sur le site
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $userInfos['id'];
                    $_SESSION['pseudo'] = $userInfos['pseudo'];
                    $_SESSION['lastname'] = $userInfos['nom'];
                    $_SESSION['firstname'] = $userInfos['prenom'];

                    // Redirection vers la page d'accueil
                    header('Location: index.php');

                } else {
                    $errorMsg = "Mot de passe incorrect..."; 
                }
            } else {
                $errorMsg = "Pseudo introuvable...";
            }           
        } else {
            $errorMsg = "Veillez compléter tous les champs...";
        }
    }
?>

<!-- // Selection des tous les infos d'un user dans la table "users" qui 
            // possede le "pseudo=?" qui va correspondre a pseudo saisis dans formulaire -->
<!-- Suppression de la SESSION / Deconnexion -->
<?php 
    session_start();

    // Stocages des "sessions ouvertes dans un tableau
    $_SESSION = [];
   
    // suppression, destruction des sessions
    session_destroy();

    // Rédirection page "login"
    header('Location: ../login.php');

<?php
    session_start();

    /*On vérifie que l'utilisateur a bien ouvert une session (login et mdp corrects) et qu'il a bien demandé une statistiques*/
    if(isset($_SESSION['id'])){
        header('Location: ../Views/statsView.php');
    }
    
    /*Si aucune session n'a été ouverte, on renvoie l'utilisateur sur index.php*/
    else{
        header('Location: ../index.php');
        exit;
    }
?>
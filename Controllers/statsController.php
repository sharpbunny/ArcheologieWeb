<?php
    session_start();

    /*On vérifie que l'utilisateur a bien ouvert une session (login et mdp corrects) et qu'il a bien demandé une statistiques*/
    if(isset($_SESSION['id']) == false){

        /*Si l'utilisateur a demandé à afficher une statistique : listeStats n'est pas vide*/
        if(empty($_POST['listeStats']) == false){
            //On appelle le modèle chargeant les données depuis la bdd
            //On envoie les données à la view pour qu'elle les affiche
            header('Location: ../Views/statsView.php?stats=true'); //A modifier plus tard
        }
        
        /*Si l'utilisateur n'a pas demandé à afficher une statistique */
        else{
            //On affiche la view sans les statistiques
            header('Location: ../Views/statsView.php?stats=false');
        }
    }
    
    /*Si aucune session n'a été ouverte, on renvoie l'utilisateur sur index.php*/
    else{
        header('Location: ../index.php');
        exit;
    }
?>
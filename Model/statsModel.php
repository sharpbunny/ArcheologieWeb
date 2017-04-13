<?php 
include ('Connector.php');
    //Si l'utilisateur a bien une session d'ouverte, on autorise sa connexion à la BDD
    if(isset($_SESSION['id'])){
       $bdd = ArcheoPDO::Connect();
            //On effectue la requête correspondant au choix de l'utilisateur

            //Si l'utilisateur a choisi d'afficher les statistiques concernant les thèmes d'intervention'
            if($_POST['listeStats'] == 'themeChart'){

                $theme = $bdd->query('select themeintervention.ID_site, themeintervention.ID_theme, theme.nomTheme FROM themeintervention
                LEFT JOIN theme ON themeintervention.ID_theme = theme.ID_theme
                ORDER BY theme.nomTheme ASC');
                ;
            }

            else{

            }
        ArcheoPDO::Disconnect();
    }

    //Si il n'est pas connecté
    else{
        //header('Location: ../index.php');
        //exit;      
    }

?>
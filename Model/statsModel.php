<?php 
    //FIXME : create CLASS
    include ('Connector.php');
    //Si l'utilisateur a bien une session d'ouverte, on autorise sa connexion à la BDD
    if(isset($_SESSION['iduser'])){
       $bdd = ArcheoPDO::Connect();
            //On effectue la requête correspondant au choix de l'utilisateur

            //Si l'utilisateur a choisi d'afficher les statistiques concernant les thèmes d'intervention'
            if($_POST['listeStats'] == 'themeChart'){

                $theme = $bdd->query('SELECT nomTheme, COUNT(nomTheme) FROM themeintervention
                    LEFT JOIN theme ON theme.ID_theme = themeintervention.ID_theme
                    GROUP BY nomTheme
                    ORDER BY nomTheme ASC'); 
                /* La requête précédente créée un tableau a deux dimensions. La première colonne contient le nom d'un thème, la seconde
                colonne contient le nombre de fois que ce thème est invoqué pour un site d'intervention.
                Exemple : "Agriculture" | 11
                          "Arts, biens de prestige" | 2
                          etc...*/  
                

                $theme->closeCursor();

                ArcheoPDO::Disconnect();
                header('Location: index.php?action=stats&amp;'.$theme.'&amp;stats=true');
            }

            else{

            }

    }

    //Si il n'est pas connecté
    else{
        //header('Location: ../index.php');
        //exit;      
    }

?>
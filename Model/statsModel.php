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
                
                $tabData = array(); //Tableau qui contiendra le nom du thème et le nombre de fois qu'il apparait.

                //On traite les données une à une
                while($data = $theme->fetch()){
                    $nom = $data['nomTheme'];
                    $themeDejaPresent = false;
                    if($tabData != null){ //Si tabData a déjà été rempli
                        foreach($tabData as $element){
                            //On regarde si le nom du thème n'existe pas déjà dans tabData
                            if($element[0] == $nom){
                                $themeDejaPresent = true;
                            }
                        }
                    }

                    else{ //Si tabData n'a pas encore été rempli
                        $tabTemp = array($nom, 1);
                        $tabData[] = $tabTemp;
                    }

                }

                $theme->closeCursor();

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
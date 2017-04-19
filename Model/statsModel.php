<?php
/**
 * In charge of managing Stats stuff
 */
class StatsModel
{
    public static function getStatsTheme()
    {

        require_once("./Model/Connector.php");
        $arrayTheme = array();
        $bdd = ArcheoPDO::Connect();
        //On effectue la requête correspondant au choix de l'utilisateur
        //Si l'utilisateur a choisi d'afficher les statistiques concernant les thèmes d'intervention'
        $request = $bdd->query('
            SELECT nomTheme, COUNT(nomTheme) as nbTheme FROM themeintervention
            LEFT JOIN theme ON theme.ID_theme = themeintervention.ID_theme
            GROUP BY nomTheme
            ORDER BY nomTheme ASC
        '); 
        /* La requête précédente créée un tableau a deux dimensions. La première colonne contient le nom d'un thème, la seconde
                colonne contient le nombre de fois que ce thème est invoqué pour un site d'intervention.
                Exemple : "Agriculture" | 11
                          "Arts, biens de prestige" | 2
                          etc...*/  
                

        $request->execute();
        $i=0;
        while($result = $request->fetch(PDO::FETCH_ASSOC)){
            $arrayTheme['label'][$i] = $result['nomTheme'];
            $arrayTheme['nb'][$i] = $result['nbTheme'];
            $i++;
        }
        ArcheoPDO::Disconnect();

        return $arrayTheme;
    }
}

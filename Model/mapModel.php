<?php 
/**
 * In charge of managing Map stuff
 */
class mapModel
{
    /**
     * Get all sites from bdd.
     */
    public static function getSite()
    {
        require_once("./Model/Connector.php");
        $arraySite = array();
        $bdd = ArcheoPDO::Connect();
        $request = $bdd->prepare("
            SELECT s.ID_site, s.nom_site, s.latitude, s.longitude
            , i.date_debut, i.date_fin
            , c.nomCommune
            , d.nomDepartement
            , GROUP_CONCAT(DISTINCT p.libellePeriode SEPARATOR '#') as libellePeriodes
            , GROUP_CONCAT(DISTINCT t.nomTheme SEPARATOR '#') as libelleThemes
            FROM site_intervention AS s
            LEFT JOIN periodeintervention AS pi ON pi.ID_site = s.ID_site
            LEFT JOIN periode as p ON p.ID_periode = pi.ID_periode
            LEFT JOIN themeintervention AS ti ON ti.ID_site = s.ID_site
            LEFT JOIN theme as t ON t.ID_theme = ti.ID_theme
            LEFT JOIN commune AS c ON c.ID_commune = s.ID_commune
            LEFT JOIN departement AS d ON d.ID_departement = c.ID_departement
            LEFT JOIN intervention AS i ON i.ID_site = s.ID_site
            GROUP BY s.ID_site
        ");


        $request->execute();
        while($result = $request->fetch(PDO::FETCH_ASSOC)){
            $arraySite[] = $result;
        }

        return $arraySite;
    }
}

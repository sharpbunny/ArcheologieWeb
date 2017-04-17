<?php 
/**
 * In charge of managing Map stuff
 */
class mapModel
{
    /**
     * Get all sites from bdd.
     */
    public function getSite()
    {
        require_once("./Model/Connector.php");
        $arraySite = array();
        $bdd = ArcheoPDO::Connect();
        $request = $bdd->prepare("
            SELECT s.ID_site, s.nom_site, s.latitude, s.longitude
            , c.nomCommune
            , d.nomDepartement
            , GROUP_CONCAT(p.libellePeriode SEPARATOR '#') as libellePeriodes
            FROM site_intervention AS s
            LEFT JOIN periodeintervention AS pi ON pi.ID_site = s.ID_site
            LEFT JOIN periode as p ON p.ID_periode = pi.ID_periode
            LEFT JOIN commune AS c ON c.ID_commune = s.ID_commune
            LEFT JOIN departement AS d ON d.ID_departement = c.ID_departement
            GROUP BY s.ID_site
        ");


        $request->execute();
        while($result = $request->fetch(PDO::FETCH_ASSOC)){
            $arraySite[] = $result;
        }

        return $arraySite;
    }
}
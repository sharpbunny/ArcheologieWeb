<?php 
/**
* In charge of managing Map stuff
*/class mapModel
{
    /**
     * Get all sites in bdd.
     */
    public function getSite()
    {
        require_once("./Model/Connector.php");
        $arraySite = array();
        $bdd = ArcheoPDO::Connect();
        $request = $bdd->prepare('SELECT s.ID_site, c.nomCommune, s.nom_site, s.latitude, s.longitude  FROM site_intervention as s
                                  LEFT JOIN commune as c ON c.ID_commune = s.ID_commune');
        $request->execute();
        while($result = $request->fetch(PDO::FETCH_ASSOC)){
            $arraySite[] = $result;
        }

        return $arraySite;
    }
}
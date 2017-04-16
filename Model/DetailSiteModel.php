<?php

class ModelDetailSite
{
    /**
     *
     */
    static public function GetData()
    {
        $getpost = array_merge($_GET, $_POST);
        $id = htmlspecialchars(isset($getpost['id'])?$getpost['id']:"");

        $bdd = ArcheoPDO::Connect();

        $request = $bdd->prepare('SELECT s.ID_site, c.nomCommune, s.nom_site, s.latitude, s.longitude  FROM site_intervention as s
                                  LEFT JOIN commune as c ON c.ID_commune = s.ID_commune
                                  WHERE s.ID_site LIKE "'.$id.'"');
        $request->execute();
        $detailSite = $request->fetch(PDO::FETCH_ASSOC);

        return $detailSite;
    }
}      

?>
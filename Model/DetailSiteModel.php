<?php

class ModelDetailSite
{
    /**
    * Fonction générale permettant de récupérer le nom du site, de la commune, la latitude et la longitude du site choisi par l'utilisateur.'
    */ 
    public static function getData()
    {
        $getpost = array_merge($_GET, $_POST);
        $id = htmlspecialchars(isset($getpost['id'])?$getpost['id']:"");

        $bdd = ArcheoPDO::Connect();

        $request = $bdd->prepare('SELECT s.ID_site, c.nomCommune, s.nom_site, s.latitude, s.longitude
                                  FROM site_intervention as s
                                  LEFT JOIN commune as c ON c.ID_commune = s.ID_commune
                                  WHERE s.ID_site LIKE "'.$id.'"');
        $request->execute();
        $detailSite = $request->fetch(PDO::FETCH_ASSOC);

        return $detailSite;
  
    }
    /**
    * Fonction récupérant la période concernée du site choisi.
    */
    public static function MettrePeriode()
    {

        $getpost = array_merge($_GET, $_POST);
        $id = htmlspecialchars(isset($getpost['id'])?$getpost['id']:"");

        $bdd = ArcheoPDO::Connect();

        $request = $bdd->prepare('SELECT libellePeriode
                                  FROM periode                            
                                  LEFT JOIN periodeintervention ON periodeintervention.ID_periode = periode.ID_periode                                                                                                   
                                  WHERE periodeintervention.ID_site = "'.$id.'"' );
        $request->execute();
        $detailSite = $request->fetch(PDO::FETCH_ASSOC);

        return $detailSite;
    }
    /**
    *Fonction pour récupérer le type d'intervention du site choisi.
    */ 
    public static function MettreTypeIntervention()
    {

        $getpost = array_merge($_GET, $_POST);
        $id = htmlspecialchars(isset($getpost['id'])?$getpost['id']:"");

        $bdd = ArcheoPDO::Connect();

        $request = $bdd->prepare('SELECT libelleIntervention
                                  FROM type_intervention                           
                                  LEFT JOIN typeintervention ON typeintervention.ID_type = type_intervention.ID_type                                                                      
                                  WHERE ID_site LIKE "'.$id.'"');
        $request->execute();
        $detailSite = $request->fetch(PDO::FETCH_ASSOC);

        return $detailSite;
    }
    /**
    *Fonction pour récupérer la date de début et de fin du site d'intervention.
    */ 
    public static function MettreDateIntervention()
    {
        $getpost = array_merge($_GET, $_POST);
        $id = htmlspecialchars(isset($getpost['id'])?$getpost['id']:"");

        $bdd = ArcheoPDO::Connect();

        $request = $bdd->prepare('SELECT date_debut, date_fin 
                                  FROM intervention                          
                                  WHERE ID_site LIKE "'.$id.'"');
        // date('d/m/Y',strtotime($request['date_debut'])); 
        // date('d/m/Y', strtotime($request['date_fin']));                         
        //  $dateDebut = new DateTime($request['date_debut']);
        //  $dateFin = new DateTime($request['date_fin']);
        //  $dateDebut->format('d-m-Y');
        //  $dateFin->format('d-m-Y');          
        $request->execute();
        $detailSite = $request->fetch(PDO::FETCH_ASSOC);

        return $detailSite;                          
    }
 
}

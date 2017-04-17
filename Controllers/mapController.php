<?php
/**
 * In charge of managing Map stuff
 */
class Map
{
    /**
     * display map
     */
    public static function displayMapView()
    {
        global $user, $basehref;
        require_once("./Views/mapView.php");
    }

    public static function getsiteintervention()
    {
        $tableauSite=array();
        require_once'./Model/Connector.php';
        $bdd= ArcheoPDO::Connect();
        $req=$bdd->prepare('SELECT * FROM site_intervention');
        $req->execute();
        while ($resultat=$req->fetch(PDO::FETCH_ASSOC)) {
            $tableauSite[]=$resultat;
            //print_r($resultat);
        }

        return $tableauSite;
    }

    /**
    * Method called by ajax request
    */
    public static function sendJson()
    {
        require('Model/mapModel.php');
        $array = mapModel::getSite();

        if (count($array) > 0) {
            echo json_encode(array('error' => 0,  'array'=>$array));
        }
        else {
            echo json_encode(array('error' => 1, 'message'=>"no stuff"));
        }
    }
}

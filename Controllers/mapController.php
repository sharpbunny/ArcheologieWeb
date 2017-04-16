<?php 
/**
* In charge of managing Map stuff
*/
class Map
{
    /**
	 * display map
	 */
	static public function DisplayMapView()
	{
        global $user, $basehref;
        require_once("./Views/mapView.php");
	}

	static public function getsiteintervention()
	{
		$tableauSite=array();
		require_once'./Model/Connector.php';
		$bdd= ArcheoPDO::Connect();
		$req=$bdd->prepare('SELECT * FROM site_intervention');
		$req->execute();
		while($resultat=$req->fetch(PDO::FETCH_ASSOC)):

		$tableauSite[]=$resultat;
		//print_r($resultat);
		endwhile;

		return $tableauSite;
	}


}
?>

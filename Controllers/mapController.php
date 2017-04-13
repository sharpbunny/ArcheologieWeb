<?php 
// Map Controller.
class Map
{
	/**
	 * display map
	 */
	static public function DisplayMapView()
	{
        global $user;
        require_once("./Views/mapView.php");
	}

}

?>

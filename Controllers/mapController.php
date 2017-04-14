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
        global $user;
        require_once("./Views/mapView.php");
	}
}
?>

<?php
/**
* In charge of managing Map stuff
*/
class Stats
{
	/**
	* display map
	*/
	static public function DisplayStatsView()
	{
        global $user;
        require_once("./Views/statsView.php");
	}
}
?>
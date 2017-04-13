<?php
/**
* In charge of managing research page and request
*/
class Research
{
	/**
	* FIXME: rename to better function's name
	*/
    static function jeanpierre($recheche)
	{
        echo $recheche;
    }

    /**
	 * display search view 
	 */
	static public function DisplaySearchView()
	{
        global $user;
		require_once("./Views/researchView.php");
	}
}

?>

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
	 * display login view 
	 */
	static public function DisplaySearchView()
	{
		require_once("./Views/researchView.php");
	}
}
?>
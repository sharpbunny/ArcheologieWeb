<?php
class Research{
    static function jeanpierre($recheche){
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
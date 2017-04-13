<?php
class Research{
    static function jeanpierre($recheche){
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

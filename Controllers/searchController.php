<?php
/**
* In charge of managing research page and request
*/
class SearchController
{
    /**
     * FIXME: rename to better function's name
     */
    static function jeanpierre($recheche)
    {
        echo $recheche;
    }

    /**
     * Display search view
     */
    static public function DisplaySearchView()
    {
        global $user, $basehref;
        require_once("./Views/searchView.php");
    }
}

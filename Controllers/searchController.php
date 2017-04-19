<?php
/**
* In charge of managing research page and request
*/
class SearchController
{
    /**
     * FIXME: rename to better function's name
     */
    public static function DisplayResultSearchView()
    {
        global $user, $basehref;
        require('Model/researchModel.php');
        $arraySearch = searchModel::DisplayResultSearchView();
        require_once("./Views/searchView.php");

    }

    /**
     * Display search view
     */
    public static function DisplaySearchView()
    {
        global $user, $basehref;
        require_once("./Views/searchView.php");
    }
}

<?php
/**
* In charge of managing Map stuff
*/
class Stats
{
    /**
     * display map
     */
    public static function DisplayStatsView()
    {
        global $user, $basehref;
        require_once("./Views/statsView.php");
    }
}

<?php
/**
* In charge of managing Map stuff
*/
class StatsController
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

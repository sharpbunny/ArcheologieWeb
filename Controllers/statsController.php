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

    /**
    * Method called by ajax request
    */
    public static function sendJsonTheme()
    {
        require('Model/statsModel.php');
        $array = statsModel::getStatsTheme();
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-Type: application/json; charset=UTF-8');

        if (count($array) > 0) {
            echo json_encode($array);
        }
        else {
            echo json_encode(array('error' => 1, 'message'=>"no stuff"));
        }
    }
}

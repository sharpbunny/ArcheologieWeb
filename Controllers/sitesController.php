<?php

class SitesController
{
    public static function DisplaySitesView()
    {
        global $user, $basehref;
        require_once("./Views/sitesView.php");
    }

    /**
    * Method called by ajax request
    */
    public static function sendJson()
    {
        require('Model/sitesModel.php');
        $arraySite = Site::getSite();
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-Type: application/json; charset=UTF-8');

        if (count($arraySite) > 0) {
            echo json_encode($arraySite);
        }
        else {
            echo json_encode(array('error' => 1, 'message'=>"no stuff"));
        }
    }

}

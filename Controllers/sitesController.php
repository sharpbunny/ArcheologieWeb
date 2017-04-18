<?php

class SitesController
{
    public static function DisplaySitesView()
    {
        global $user, $basehref;
        require_once("./Views/sitesView.php");
    }

}

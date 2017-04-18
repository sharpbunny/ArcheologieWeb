<?php

class SiteController
{
    public static function SitesView()
    {
        global $user, $basehref;
        require_once("./Views/sitesView.php");
    }

}

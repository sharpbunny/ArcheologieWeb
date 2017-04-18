<?php
class DetailController
{
    static public function DisplayDetailView()
    {
        global $user, $basehref;
        require_once("Model/DetailSiteModel.php");
        $TableauEstBienRempli = ModelDetailSite::getData();
        require_once("Views/detailView.php");
    }
}

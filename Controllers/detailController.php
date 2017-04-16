<?php
class DetailController
{
    static public function DisplayDetailView()
    {
        global $user, $basehref;
        require_once("Model/DetailSiteModel.php");    
        $TableauEstBienRempli = ModelDetailSite::GetData();
        require_once("Views/detailView.php");    
    }
}
?>
<?php
class SearchModel {
    /**
     * Get search sites from bdd.
     */
    public static function DisplayResultSearchView() {
        require_once("./Model/Connector.php");
        if(!isset($_POST['researchField']) ) {
            $arraySearch = array();
        } else {
            $bdd = ArcheoPDO::Connect();
            $request = $bdd->prepare("SELECT * FROM site_intervention WHERE nom_site LIKE '%".htmlspecialchars($_POST['researchField'])."%'ORDER BY nom_site");
            $request->execute();
            while ($result = $request->fetch(PDO::FETCH_ASSOC)) {
                $arraySearch[] = $result;
            }
        }
        return $arraySearch;
    }
 
}

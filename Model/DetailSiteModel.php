<?php
require_once("Connector.php");
class ModelDetailSite
{
    
    static public function GetData()
    {
    $StockageConnexion = ArcheoPDO::Connect();

    $result = $StockageConnexion("SELECT * FROM detailintervention");
    $Donneesprises = $result->fetchAll();
    var_dump($Donneesprises);

    if(isset($_POST['BoutonA'])) 
    {
        $a =$Donneesprises;
    }
    }
}
?>
<?php
require_once("Connector.php");
class ModelDetailSite
{
    
    static public function GetData()
    {
        $StockageConnexion = ArcheoPDO::Connect();

         $result = $StockageConnexion->query("SELECT * FROM site_intervention WHERE ID_site='fff52f4ac0a03ea9b7b28a8cbd72342496b090d1'");
        $TableauRempli;
        
        while ($donnees = $result->fetch())
        {
            $TableauRempli =[
                "ID_site"=>$donnees['ID_site'],
                "nom_site"=>$donnees['nom_site'],
                "latitude"=>$donnees['latitude'],
                "longitude"=>$donnees['longitude'],
                "ID_commune"=>$donnees['ID_commune'],
            ];
        }      
        //Nouvelle requête pour ajouter des éléments dans le tableau ( méthode tableau associatif).
        $resultatcommune = $StockageConnexion->query("SELECT * FROM commune WHERE ID_commune='1'");
        while ($donnees = $resultatcommune->fetch())
        {
            $TableauRempli['nomCommune'] = $donnees['nomCommune'];
            $TableauRempli['ID_departement'] = $donnees['ID_departement'];
        
        }
        return $TableauRempli;
    }
   
}      
        if(isset($_POST['BoutonA'])) 
        {
             $TableauEstBienRempli = ModelDetailSite::GetData();
        }
?>
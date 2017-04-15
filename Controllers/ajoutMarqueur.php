<?php
class AjoutMarqueur{

 public static function Connect() 
    {
        //$host = '10.111.61.148';
        $host = 'Localhost';
        //$bdd = 'intervention_bdd';
        $bdd = 'interventionbdd';
        //$user = 'csharp';
        $user = 'root';
        //$password = 'csharp';
        $password = '';
        try
        {
            $mysqlPDO = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8",
            $user, $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        { // en cas erreur on affiche un message et on arrete tout
            die('<h1>Erreur de connexion : </h1>' . $e->getMessage());
        }
        return $mysqlPDO;
    }

	public static function getsiteintervention()
	{
		$tableauSite=array();		
		$bdd=AjoutMarqueur::Connect();
		$req=$bdd->prepare('Select * from site_intervention');
		$req->execute();
		while($resultat=$req->fetch(PDO::FETCH_ASSOC)):

		$tableauSite[]=$resultat;
		//print_r($resultat);			
		endwhile;

		return $tableauSite;
	}
}
$emplacementmarqueur;
$emplacementmarqueur=AjoutMarqueur::getsiteintervention();
print_r (json_encode($emplacementmarqueur));
?>
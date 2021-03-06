<?php

class Site
{

    /**
    *
    */
    public static function MenuDVille()
    {      
        $bdd = ArcheoPDO::Connect();
        $reponse = $bdd->query("SELECT DISTINCT nomCommune from commune order by nomCommune asc");

        while ($donnees = $reponse->fetch())
        {
            echo '<option>'.$donnees['nomCommune']."\n";
        }
        $reponse->closeCursor();
        ArcheoPDO::Disconnect();
    }

    /**
    *
    */
    public static function MenuDDepartement()
    {        
        $bdd = ArcheoPDO::Connect();
        $reponse = $bdd->query("SELECT DISTINCT nomDepartement from departement order by nomDepartement asc");  

        while ($donnees = $reponse->fetch())
        {
        ?><option><?php echo $donnees['nomDepartement']."\n";
        }
        $reponse->closeCursor();
        ArcheoPDO::Disconnect();
    }

    /**
    *
    */
    public static function AfficheSiteParASC()
    {
        $bdd = ArcheoPDO::Connect();
        $reponse = $bdd->query("SELECT nomCommune,nom_site,libellePeriode,date_debut,date_fin from commune
                                left join site_intervention on commune.ID_commune = site_intervention.ID_commune
                                left join periodeintervention on site_intervention.ID_site = periodeintervention.ID_site
                                left join periode on periodeintervention.ID_periode = periode.ID_periode
                                left join intervention on site_intervention.ID_site = intervention.ID_site
                                order by commune.nomCommune asc;");

        while ($donnees = $reponse->fetch())
        {
            echo $donnees['nomCommune'], $donnees['nom_site'], $donnees['libellePeriode'], $donnees['date_debut'], $donnees['date_fin'];
            echo '<br>';
        }
        $reponse->closeCursor();
        ArcheoPDO::Disconnect();
    }

    /**
    *
    */
    public static function FiltreParVille($ville)
    {
        $bdd = ArcheoPDO::Connect();
        $reponse = $bdd->query("SELECT site_intervention.ID_site,nomCommune,nom_site,date_debut,date_fin,nomDepartement,
                                GROUP_CONCAT(DISTINCT libellePeriode SEPARATOR '#') as libellePeriodes
                                from commune
                                left join departement on commune.ID_departement = departement.ID_departement                              
                                left join site_intervention on commune.ID_commune = site_intervention.ID_commune
                                left join periodeintervention on site_intervention.ID_site = periodeintervention.ID_site
                                left join periode on periodeintervention.ID_periode = periode.ID_periode
                                left join intervention on site_intervention.ID_site = intervention.ID_site
                                where nomCommune=\"$ville\"
                                GROUP BY site_intervention.ID_site
                                order by commune.nomCommune asc;");

        while ($donnees = $reponse->fetch())
        {
            $dateD = new DateTime($donnees['date_debut']);
            $dateF = new DateTime($donnees['date_fin']);
            echo '<tr>';
            echo '<td>'.$donnees["nomCommune"].'</td>';
            echo '<td>'.$donnees["nomDepartement"].'</td>';
            echo '<td><a href="detail/view/'.$donnees['ID_site'].'">'.$donnees["nom_site"].'</a></td>';
            echo '<td>'.$donnees['libellePeriodes'].'</td>';
            echo '<td>'.$dateD->format('d/m/Y').'</td>';
            echo '<td>'.$dateF->format('d/m/Y').'</td>';
            echo '</tr>';
        }
        $reponse->closeCursor();
        ArcheoPDO::Disconnect();
    }

    /**
    *
    */
    public static function FiltreParDpt($dpt)
    {        
        $bdd = ArcheoPDO::Connect();   
        $reponse = $bdd->query("SELECT site_intervention.ID_site,nomDepartement,nom_site,date_debut,date_fin,nomCommune, 
                                GROUP_CONCAT(DISTINCT libellePeriode SEPARATOR '#') as libellePeriodes
                                from departement
                                left join commune on departement.ID_departement = commune.ID_departement
                                left join site_intervention on commune.ID_commune = site_intervention.ID_commune
                                left join periodeintervention on site_intervention.ID_site = periodeintervention.ID_site
                                left join periode on periodeintervention.ID_periode = periode.ID_periode
                                left join intervention on site_intervention.ID_site = intervention.ID_site
                                where departement.nomDepartement = \"$dpt\"
                                GROUP BY site_intervention.ID_site
                                order by departement.nomDepartement asc;");
 
        while ($donnees = $reponse->fetch())
        {
            $dateD = new DateTime($donnees['date_debut']);
            $dateF = new DateTime($donnees['date_fin']);
            echo '<tr>';
            echo '<td>'.$donnees["nomCommune"].'</td>';
            echo '<td>'.$donnees["nomDepartement"].'</td>';
            echo '<td><a href="detail/view/'.$donnees['ID_site'].'">'.$donnees["nom_site"].'</a></td>';
            echo '<td>'.$donnees['libellePeriodes'].'</td>';
            echo '<td>'.$dateD->format('d/m/Y').'</td>';
            echo '<td>'.$dateF->format('d/m/Y').'</td>';
            echo '</tr>';              
        }
        $reponse->closeCursor();
        ArcheoPDO::Disconnect();
    }

    /**
    *
    */
    public static function getSite()
    {
        $bdd = ArcheoPDO::Connect();
        $query = htmlspecialchars(isset($_POST['query'])?$_POST['query']:"");
        $data = htmlspecialchars(isset($_POST['data'])?$_POST['data']:"");
        $group = htmlspecialchars(isset($_POST['group'])?$_POST['group']:"");
        $arraySite= array();
        if ($data=='ville') {            
            if ($group!="") {
                $request = $bdd->query('SELECT ID_departement FROM departement WHERE nomDepartement LIKE "%'.$group.'%"');
                $request->execute();
                $result = $request->fetch(PDO::FETCH_ASSOC);
                $iddpt = $result['ID_departement'];
                $request = $bdd->query('SELECT DISTINCT nomCommune as label FROM commune WHERE nomCommune LIKE "%'.$query.'%" AND ID_departement = '.$iddpt.' order by nomCommune ASC');
            } else {
                $request = $bdd->query('SELECT DISTINCT nomCommune as label FROM commune WHERE nomCommune LIKE "%'.$query.'%" order by nomCommune ASC');
            }
        } elseif ($data=='dept') {
            $request = $bdd->query('SELECT DISTINCT nomDepartement as label FROM departement WHERE nomDepartement LIKE "%'.$query.'%" order by nomDepartement ASC');
        } else {
            ArcheoPDO::Disconnect();
            return $arraySite;
        }
        $request->execute();
       
        while($result = $request->fetch(PDO::FETCH_ASSOC)) {
            //$arraySite[]['id'] = $result['label'];
            $arraySite[]['label'] = $result['label'];
        }
        ArcheoPDO::Disconnect();
        return $arraySite;
    }
}

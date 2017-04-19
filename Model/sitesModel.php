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
            echo '<option>'.$donnees['nomCommune'];
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
        ?><option><?php echo $donnees['nomDepartement'];
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

        $reponse = $bdd->query("SELECT site_intervention.ID_site,nomCommune,nom_site,date_debut,date_fin,
                                GROUP_CONCAT(DISTINCT libellePeriode SEPARATOR '#') as libellePeriodes
                                from commune                                
                                left join site_intervention on commune.ID_commune = site_intervention.ID_commune
                                left join periodeintervention on site_intervention.ID_site = periodeintervention.ID_site
                                left join periode on periodeintervention.ID_periode = periode.ID_periode
                                left join intervention on site_intervention.ID_site = intervention.ID_site
                                where nomCommune=\"$ville\"
                                GROUP BY site_intervention.ID_site
                                order by commune.nomCommune asc;");

        while ($donnees = $reponse->fetch())
        {
            echo '<tr>';
            echo '<td><a href="detail/view/'.$donnees['ID_site'].'>'.$donnees["nomCommune"].'</a></td>';
            echo '<td>'.$donnees["nom_site"].'</td>';
            echo '<td>'.$donnees['libellePeriodes'].'</td>';
            echo '<td>'.$donnees['date_debut'].'</td>';
            echo '<td>'.$donnees['date_fin'].'</td>';
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
        
        $reponse = $bdd->query("SELECT site_intervention.ID_site,nomDepartement,nom_site,date_debut,date_fin, 
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
            echo '<tr>';
            echo '<td><a href="detail/view/'.$donnees['ID_site'].'>'.$donnees["nomDepartement"].'</a></td>';
            echo '<td>'.$donnees["nom_site"].'</td>';
            echo '<td>'.$donnees['libellePeriodes'].'</td>';
            echo '<td>'.$donnees['date_debut'].'</td>';
            echo '<td>'.$donnees['date_fin'].'</td>';
            echo '</tr>';              
        }
        $reponse->closeCursor();

        ArcheoPDO::Disconnect();
    }

    

}

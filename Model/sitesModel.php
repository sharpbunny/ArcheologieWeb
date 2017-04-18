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

        $reponse = $bdd->query("SELECT nomCommune,nom_site,libellePeriode,date_debut,date_fin from commune
                                left join site_intervention on commune.ID_commune = site_intervention.ID_commune
                                left join periodeintervention on site_intervention.ID_site = periodeintervention.ID_site
                                left join periode on periodeintervention.ID_periode = periode.ID_periode
                                left join intervention on site_intervention.ID_site = intervention.ID_site
                                where nomCommune=\"$ville\"
                                order by commune.nomCommune asc;");

        while ($donnees = $reponse->fetch())
        {
            echo '<tr>';
            echo '<td>'.$donnees["nomCommune"].'</td>';
            echo '<td>'.$donnees["nom_site"].'</td>';
            echo '<td>'.$donnees['libellePeriode'].'</td>';
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
        
        $reponse = $bdd->query("
            SELECT nomDepartement, nom_site, libellePeriode, date_debut, date_fin
            FROM departement
            LEFT JOIN commune ON departement.ID_departement = commune.ID_departement
                                left join site_intervention on commune.ID_commune = site_intervention.ID_commune
                                left join periodeintervention on site_intervention.ID_site = periodeintervention.ID_site
                                left join periode on periodeintervention.ID_periode = periode.ID_periode
                                left join intervention on site_intervention.ID_site = intervention.ID_site
                                where departement.nomDepartement = \"$dpt\"
                                order by departement.nomDepartement asc;"
        );

        while ($donnees = $reponse->fetch())
        {
        ?><tr><?php
                ?><td><?php echo $donnees['nomDepartement']?></td><?php
                ?><td><?php echo $donnees['nom_site']?></td><?php
                ?><td><?php echo $donnees['libellePeriode']?></td><?php
                ?><td><?php echo $donnees['date_debut']?></td><?php
                ?><td><?php echo $donnees['date_fin']?></td><?php
        ?></tr><?php                
        }
        $reponse->closeCursor();

        ArcheoPDO::Disconnect();
    }

}

<?php
/**
 *
 */
function MenuDVille()
{
    try
    {
        $bdd = new PDO('mysql:host=10.111.61.148;dbname=intervention_bdd;charset=utf8', 'csharp', 'csharp');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    $reponse = $bdd->query("SELECT DISTINCT nomCommune from commune order by nomCommune asc");

    while ($donnees = $reponse->fetch())
    {
        echo '<option>'.$donnees['nomCommune'];
    }
    $reponse->closeCursor();
}

/**
 *
 */
function MenuDDepartement()
{        
        try
        {
        $bdd = new PDO('mysql:host=10.111.61.148;dbname=intervention_bdd;charset=utf8', 'csharp', 'csharp');
        }
        catch (Exception $e)
        {
        die('Erreur : ' . $e->getMessage());
        }
        $reponse = $bdd->query("SELECT DISTINCT nomDepartement from departement order by nomDepartement asc");
        
        while ($donnees = $reponse->fetch())
        {
        ?><option><?php echo $donnees['nomDepartement'];
        }
        $reponse->closeCursor();
}

/**
 *
 */
function AfficheSiteParASC()
{
        try
        {
        $bdd = new PDO('mysql:host=10.111.61.148;dbname=intervention_bdd;charset=utf8', 'csharp', 'csharp');
        }
        catch (Exception $e)
        {
        die('Erreur : ' . $e->getMessage());
        }
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
    return $affSite;
}

/**
 *
 */
function FiltreParVille($ville)
{
    try
    {
        $bdd = new PDO('mysql:host=10.111.61.148;dbname=intervention_bdd;charset=utf8', 'csharp', 'csharp');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
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

}

/**
 *
 */
function FiltreParDpt($dpt)
{        
        try
        {
        $bdd = new PDO('mysql:host=10.111.61.148;dbname=intervention_bdd;charset=utf8', 'csharp', 'csharp');
        }
        catch (Exception $e)
        {
        die('Erreur : ' . $e->getMessage());
        }
        $reponse = $bdd->query("SELECT nomDepartement,nom_site,libellePeriode,date_debut,date_fin from departement
                                left join commune on departement.ID_departement = commune.ID_departement
                                left join site_intervention on commune.ID_commune = site_intervention.ID_commune
                                left join periodeintervention on site_intervention.ID_site = periodeintervention.ID_site
                                left join periode on periodeintervention.ID_periode = periode.ID_periode
                                left join intervention on site_intervention.ID_site = intervention.ID_site
                                where departement.nomDepartement = \"$dpt\"
                                order by departement.nomDepartement asc;");

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
}

$dptSelectionne = "";
$villeSelectionnee = "";

if (isset($_POST['vil']) || isset($POST['dpt'])) { 
    $villeSelectionnee = $_POST['vil'];
    $dptSelectionne = $_POST['dpt'];
}

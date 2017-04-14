<!doctype html>
<?php
header('Content-type: text/html; charset=utf-8');
include 'Model\sitesModel.php';

?>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style.css" />
        <title>Recherche par site</title>
    </head>
    <body>
        <div id=entete>
            <h1> Recherche par site </h1>
        </div>
        <div id="divGauche">
            <p>Recherche</p>
            <form method='POST' action="">
                <SELECT id="departement" class="menuD" name ="dpt" size="1">
                    <option>*Choisissez votre département*                    
                    <?php MenuDDepartement(); ?>                             
                </SELECT>
                <br>
                <SELECT id="ville" class="menuD" name ="vil" size="1">
                    <option>*Choisissez votre ville*
                    <?php MenuDVille(); ?>               
                </SELECT>
                <br>
                <input type='submit'>
            </form>
            <br>
                 
        </div> 
        <div id="divDroite">
            <table>
                <th id='nomDpt'>Nom/Département</th>
                <th id='nSite'>Nom du Site</th>
                <th>Libellé période</th>
                <th class='date'>Date de début</th>
                <th class='date'>Date de fin</th>
                <?php FiltreParDpt($dptSelectionne);?>
                <?php FiltreParVille($villeSelectionnee);?>
            <table>
        </div>
    </body>
    
</html>
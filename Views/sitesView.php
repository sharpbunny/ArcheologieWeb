<?php
// page title
$title = "Recherche par Sites";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharpbunny, Inc.</p>';
// buffer init
$links=array();
$links[]='<link rel="stylesheet" href="Assets/CSS/mapView.css">';
$links[]='<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />';
// left side
ob_start();
?>
        <div id="divGauche">
            <p>Recherche</p>
            <form method='POST' action="">
                <SELECT id="departement" class="menuD" name ="dpt" size="1">
                    <option>*Choisissez votre département*                    
                    <?php Site::MenuDDepartement(); ?>                             
                </SELECT>
                <br>
                <SELECT id="ville" class="menuD" name ="vil" size="1">
                    <option>*Choisissez votre ville*
                    <?php Site::MenuDVille(); ?>               
                </SELECT>
                <br>
                <input type='submit'>
            </form>
            <br>
                 
        </div>
<?php
// store buffer into $content
$leftcontent = ob_get_clean();
ob_start();
?>
        <div id="divDroite">
            <table>
                <th id='nomDpt'>Nom/Département</th>
                <th id='nSite'>Nom du Site</th>
                <th>Libellé période</th>
                <th class='date'>Date de début</th>
                <th class='date'>Date de fin</th>
                <?php Site::FiltreParDpt($dptSelectionne);?>
                <?php Site::FiltreParVille($villeSelectionnee);?>
            <table>
        </div>
<?php
// store buffer into $content
$content = ob_get_clean();


// include scripts with template
$scripts=array();
$scripts[]='<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>';
$scripts[]='<script src="Assets/JS/mapView.js"></script>';
// call template to display
include('Views/siteTemplate.php');

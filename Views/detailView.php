<?php
// page title
$title = "Détail du Site";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharpbunny, Inc.</p>';
// buffer init
$links=array();
$links[]='<link rel="stylesheet" href="Assets/CSS/mapView.css">';
$links[]='<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />';
// left side
ob_start();
?>
    <div id="divDeGauche">
        <h3> Détail du site d'intervention</h3>
        <p> Pays : France </p>
        <p id="TitreRegionPlusImage">Région : Île-de-France </p>
        <!--<img src="RegionIDF.png" alt="Détail de la région île de France" title ="Zone géographique des sites archéologiques">-->
        <p>Localisation :</p>
        <ul>
            <li id="LongitudeChoisi"> Longitude : <?php if(isset($TableauEstBienRempli)){echo $TableauEstBienRempli["longitude"];} ?></li>
            <li id="LatitudeChoisi"> Latitude : <?php if(isset($TableauEstBienRempli)){echo $TableauEstBienRempli["latitude"];} ?></li>
        </ul>
        <p id="PeriodeChoisi">Période concernée : Paléolithique, Mésolithique, Néolithique, Âge du Bronze, Âge du Fer, Antiquité, Moyen Âge, Epoque moderne<p>
        <p id="EtatSiteChoisi"> Etat du site : (Transfert l'information de la BDD : Ouvert au public (périodes destinées, normes de protections.) || Fermé au public (En cours d'investigation, travaux, restauration.) </p>
        <p id="TypeSiteChoisi"> Type de site : (Transfert l'information de la BDD : Bâtiments, Ruines, Artefacts, Décorations)
    </div>
<?php
$leftcontent = ob_get_clean();
// main of page
ob_start();
?>
    <div class="container">
        <!-- <img  id="MonImage" src="Assets/Images/Ruine.jpg" alt="Ruine de Bavay" title="Site archélogique choisi"> -->
    <iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://cartosm.eu/map?lon=<?php echo $TableauEstBienRempli["longitude"]; ?>&lat=<?php echo $TableauEstBienRempli["latitude"]; ?>&zoom=12&width=640&height=480&mark=true&nav=true&pan=true&zb=inout&style=default&icon=down"></iframe>
    </div>
    <div class="container">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Détail du site</div>
            <!-- Table -->
            <table class="table">
                <tr>
                    <th>Localisation</th>
                    <th>Nom du site</th>
                </tr>
                <tr>
                    <td>0.00</td>
                    <td>Site de fouille A<?php if(isset($TableauEstBienRempli)){echo $TableauEstBienRempli["nom_site"];} ?>  <button name="BoutonA">Choisir</button> </td>
                </tr>
                <tr>
                    <td>0.10</td>
                    <td>Site de fouille B<?php if(isset($TableauEstBienRempli)){echo $TableauEstBienRempli["nomCommune"];} ?> <button id="BoutonB">Choisir</button></td>
                <tr>
                    <td>0.20</td>
                    <td>Site de fouille C <?php if(isset($TableauEstBienRempli)){echo $TableauEstBienRempli["ID_departement"];} ?> <button id="BoutonC">Choisir</button></td>
                </tr>
                <tr>
                    <td>0.30</td>
                    <td>Site de fouille D</td>
                </tr>
            </table>
        </div>
    </div>
<?php
// store buffer into $content
$content = ob_get_clean();

// include scripts with template
$scripts=array();
// call template to display
include('Views/siteTemplate.php');

?>

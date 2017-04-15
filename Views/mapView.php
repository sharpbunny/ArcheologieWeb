<?php
// page title
$title = "Carte des Sites";
// page footer content
$footer = "Contenu bas de page";
// buffer init
$links=array();
$links[]='<link rel="stylesheet" href="Assets/CSS/mapView.css">';
$links[]='<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />';
ob_start();
?>

       

    <div id="page">
        <div id="centrerPage">
                <div id="gauche">
            <!-- DIV : Aucun sens sémantique - zone géographique -->
        
                    <?php
                     echo'<input id="activerpointeur" type="submit" value="pointeur" href="mapController.php">';
                    $tab=Map::getsiteintervention();
                       //require'./Controllers/mapController.php';
                    //    for ($i=0;$i < count($tab);$i++)
                    //    {
                    //   echo'<p>';print_r($tab[$i]['ID_site']) ;echo'</P>';
                    //    echo('<p>'.$tab[$i]['nom_site'].'</p>');
                    //      echo('<p>'.$tab[$i]['latitude'].'</p>');
                    //      echo('<p>'.$tab[$i]['longitude'].'</p>');
                    //        echo('<p>'.$tab[$i]['ID_commune'].'</p>');
                    //    }
                     ?>
                </div>

                <div id="droite">
                    <div id="map">
                    
                    </div>             
                </div>
        </div>
    </div>
<script src="Assets/JS/jquery-3.2.1.js"></script>
<script src="Assets/JS/mapView.js"></script>
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<!--<script src="Assets/JS/leaflet.js"></script>-->
<?php
// store buffer into $content
$content = ob_get_clean();
// call template to display
include('Views/siteTemplate.php');

?>


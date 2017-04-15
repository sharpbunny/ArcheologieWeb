<?php
// page title
$title = "Carte des Sites";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharpbunny, Inc.</p>';
// buffer init
$links=array();
$links[]='<link rel="stylesheet" href="Assets/CSS/mapView.css">';
$links[]='<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />';
// left side
ob_start();

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

$leftcontent = ob_get_clean();
// main of page
ob_start();
echo '<div class="container"><div id="map"></div></div>';
// store buffer into $content
$content = ob_get_clean();


// include scripts with template
$scripts=array();
$scripts[]='<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>';
$scripts[]='<script src="Assets/JS/mapView.js"></script>';
// call template to display
include('Views/siteTemplate.php');

?>


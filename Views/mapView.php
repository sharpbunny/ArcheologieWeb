<?php
// page title
$title = "Carte des Sites";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharbunny, Inc.</p>';
// buffer init
$links=array();
$links[]='<link rel="stylesheet" href="Assets/CSS/mapView.css">';
$links[]='<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />';
//ob_start();

$leftcontent='Paramètres';

$content = '<div class="container"><div id="map"></div></div>';


// include scripts with template
$scripts=array();
$scripts[]='<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>';
$scripts[]='<script src="Assets/JS/mapView.js"></script>';
// store buffer into $content
//$content = ob_get_clean();
// call template to display
include('Views/siteTemplate.php');

?>


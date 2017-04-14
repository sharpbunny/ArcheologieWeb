<?php
// page title
$title = "Carte des Sites";
// page footer content
$footer = "Contenu bas de page";
// buffer init
//$links=array();
//$links[]='<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />';
ob_start();
?>
<style>
		#map {
			width: 600px;
			height: 400px;
		}
	</style>
<div id="map"></div>

<?php

// store buffer into $content
$content = ob_get_clean();
// call template to display
include('Views/siteTemplate.php');

?>
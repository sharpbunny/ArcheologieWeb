<?php
// page title
$title = "Carte des Sites";
// page footer content
$footer = "Contenu bas de page";
// buffer init
ob_start();

echo '<div id="map"></div>';

// store buffer into $content
$content = ob_get_clean();

// call template to display
include('Views/siteTemplate.php');

?>
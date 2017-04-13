<?php
// page title
$title = "map";
// page footer contenyt
$footer = "Contenu bas de page";
// buffer init
ob_start();

echo '<div id="map"></div>';

// store buffer into $content
$content = ob_get_clean();

$user = "";

// call template to display
include('Views/sitetemplate.php');

?>
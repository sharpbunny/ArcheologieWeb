<?php
// page title
$title = "map";
// page footer content
$footer = "Contenu bas de page";
// buffer init
ob_start();

echo '<div id="map"></div>';

// store buffer into $content
$content = ob_get_clean();

$user = "";

// call template to display
include('Views/siteTemplate.php');

?>
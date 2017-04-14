<?php
// page title
$title = "Accueil";
// page footer content
$footer = "Contenu bas de page";
// buffer init
ob_start();
?>

<?php

// store buffer into $content
$content = ob_get_clean();

// call template to display
include('Views/siteTemplate.php');

?>

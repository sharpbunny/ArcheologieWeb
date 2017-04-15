<?php
// page title
$title = "Mon compte";
// page footer content
$footer = '<p class="text-muted credit">Contenu bas de page</p>';
// buffer init
ob_start();

echo '<p>Utilisateur: '.$user->login.'</p>';
echo '<p>Level: '.$user->rankingaccess.'</p>';


// store buffer into $content
$content = ob_get_clean();

// call template to display
include('Views/siteTemplate.php');

?>

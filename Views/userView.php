<?php
// page title
$title = "Mon compte";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharpbunny, Inc.</p>';
// buffer init
//ob_start();

$leftcontent = '<p>Mon compte</p>';
$leftcontent .= '<p>Mes préférences</p>';
$leftcontent .= '<button class="btn btn-primary" type="button"> Messages <span class="badge">4</span></button>';


$content = '<p>Utilisateur: '.$user->login.'</p>';
$content .= '<p>Level: '.$user->rankingaccess.'</p>';

// store buffer into $content
//$content = ob_get_clean();

// call template to display
include('Views/siteTemplate.php');

?>

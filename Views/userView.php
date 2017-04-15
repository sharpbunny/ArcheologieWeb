<?php
// page title
$title = "Mon compte";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharbunny, Inc.</p>';
// buffer init
//ob_start();

$leftcontent = '<p>Utilisateur: '.$user->login.'</p>';
$leftcontent .= '<p>Level: '.$user->rankingaccess.'</p>';

$content = '<p>Utilisateur: '.$user->login.'</p>';
$content .= '<p>Level: '.$user->rankingaccess.'</p>';

// store buffer into $content
//$content = ob_get_clean();

// call template to display
include('Views/siteTemplate.php');

?>

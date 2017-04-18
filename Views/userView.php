<?php
// page title
$title = "Mon compte";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharpbunny, Inc.</p>';
// buffer init
ob_start();
?>
<p>Mon compte</p>
<p>Mes préférences</p>
<button class="btn btn-primary" type="button"> Messages <span class="badge">4</span></button>
<?php
$leftcontent = ob_get_clean();
?>
<p>Utilisateur: <?php echo $user->login; ?></p>
<p>Level: <?php echo $user->rankingaccess; ?></p>
<?php
// store buffer into $content
$content = ob_get_clean();

// call template to display
include('Views/siteTemplate.php');

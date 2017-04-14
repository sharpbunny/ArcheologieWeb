<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Assets/CSS/stylesheet.css" />
<?php
if (isset($links)) {
    foreach ($links as $link){
        echo "    ".$link."\n";
    }
}
?>
    <title><?php echo $title; ?></title>
  </head>
  <body id="bodyRecherche">
    <div id="global">
      <header>
        <a href="#"><h1>ArchéoSite</h1></a>

        <?php
        if ($user->iduser>0) {
            echo "<p>Bienvenue ".$user->login."</p>";
            echo "<nav>";
            echo "<a href=\"index.php?action=search\">Recherche</a>";
            echo "<a href=\"index.php?action=stats\">Stats</a>";
            echo "<a href=\"index.php?action=map\">Maps</a>";
            echo "</nav>";
            echo "<form method='POST' action='index.php?action=logout'>";
            echo "<input name='deco' type='submit' value='Se déconnecter'>";
            echo "</form>";
        }
               
        else echo "<p>Visiteur Connectez-vous</p>";
        ?>

      </header>
      <div id="content">
        <?php echo $content; ?>
      </div>
    </div>
<?php
include("footer.php");
?>
  </body>

</html>

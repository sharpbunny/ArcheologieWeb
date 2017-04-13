<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Assets/CSS/stylesheet.css" />
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <div id="global">
      <header>
        <a href="index.php"><h1>ArchéoSite</h1></a>
        <p>
        <?php
         if (isset($user->login))
                echo "Bienvenue ".$user->login;
        else echo "Connectez-vous";
        ?>
        </p>
      </header>
      <div id="content">
        <?php echo $content; ?>
      </div>
    </div>
  </body>

  <?php require_once("footer.php"); ?>

</html>
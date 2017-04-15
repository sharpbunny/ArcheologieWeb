<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <base href="/~fred/ArcheologieWeb/" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="php training">
        <meta name="author" content="sharpbunny">
        <link rel="icon" href="favicon.ico">
        <link rel="stylesheet" href="Assets/CSS/stylesheet.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php
if (isset($links)) {
    foreach ($links as $link){
        echo "    ".$link."\n";
    }
}
?>
        <title><?php echo $title; ?></title>
    </head>
    <body><br><br>
        <div id="wrap">
            <div class="container">
        <?php
        if ($user->iduser>0) {
            echo '<nav class="navbar navbar-inverse navbar-fixed-top">'."\n";
            echo '<div class="container">'."\n";
            echo '<div class="navbar-header">'."\n";
            echo '<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">'."\n";
            echo '<span class="sr-only">Toggle navigation</span>'."\n";
            echo '<span class="icon-bar"></span>'."\n";
            echo '<span class="icon-bar"></span>'."\n";
            echo '<span class="icon-bar"></span>'."\n";
            echo '<span class="icon-bar"></span>'."\n";
            echo '</button>'."\n";
            echo '<a class="navbar-brand" href="#">ArchéoSite</a>'."\n";
            echo '</div>'."\n";
            echo '<div id="navbar" class="collapse navbar-collapse">'."\n";
            echo '<ul class="nav navbar-nav">'."\n";
            echo '    <li class="active"><a href="#">Home</a></li>'."\n";
            echo '    <li><a href="search">Recherche</a></li>'."\n";
            echo '    <li><a href="stats">Stats</a></li>'."\n";
            echo '    <li><a href="map/view">Maps</a></li>'."\n";
            echo '    <li class="dropdown">';
            echo '        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenue '.$user->login.'<b class="caret"></b></a>'."\n";
            echo '        <ul class="dropdown-menu">';
            echo '            <li><a href="user/info/'.$user->iduser.'">Votre compte</></li>';
            echo '            <li class="divider"></li>';
            echo '            <li><a href="user/logout">Déconnexion</a></li>';
            echo '        </ul>';
            echo '    </li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo "</nav>";
        } else {
            echo '    <nav class="navbar navbar-inverse navbar-fixed-top">'."\n";
            echo '        <div class="container">'."\n";
            echo '            <div class="navbar-header">'."\n";
            echo '                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">'."\n";
            echo '                    <span class="sr-only">Toggle navigation</span>'."\n";
            echo '                    <span class="icon-bar"></span>'."\n";
            echo '                </button>'."\n";
            echo '                <a class="navbar-brand" href="#">ArchéoSite</a>';
            echo '            </div>';
            echo '            <div id="navbar" class="collapse navbar-collapse">';
            echo '                <ul class="nav navbar-nav">';
            echo '                    <li class="active"><a href="#">Home</a></li>';
            echo '                    <li>Visiteur Connectez-vous</li>';
            echo '                </ul>';
            echo '    <form id="formLogin" action="user/login" method="POST">';
            echo '    <input id="pseudoLogin" type="text" name="pseudoLogin" placeholder="Identifiant">';
            echo '    <input id="passwordLogin" type="password" name="passwordLogin" placeholder="Mot de Passe">';
            echo '    <input id="validerLogin" type="submit" name="validerLogin" value="Se connecter">';
            echo '    </form>';

            echo '            </div>';
            echo '        </div>';
            echo "    </nav>";
          if (isset($_GET['message'])) {echo "<p>".$_GET['message']."</p>";}
        }
        ?>
        </div>
        <div class="container">
        <?php echo $content; ?>
        </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
include("footer.php");
?>
    </body>
</html>

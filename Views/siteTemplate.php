<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <base href="<?php echo $basehref; ?>" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="php training">
        <meta name="author" content="sharpbunny">
        <link rel="icon" href="favicon.ico">
        <link rel="stylesheet" href="Assets/CSS/stylesheet.css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php
$getpost = array_merge($_GET, $_POST);
$controller = htmlspecialchars(isset($getpost['controller'])?$getpost['controller']:"");
if (isset($links)) {
    foreach ($links as $link){
        echo "        ".$link."\n";
    }
}
?>
        <title><?php echo $title; ?></title>
    </head>
    <body>
<?php
if ($user->iduser>0) {
            echo '<nav class="navbar navbar-inverse navbar-fixed-top">'."\n";
            echo '    <div class="container">'."\n";
            echo '        <div class="navbar-header">'."\n";
            echo '            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">'."\n";
            echo '                <span class="sr-only">Toggle navigation</span>'."\n";
            echo '                <span class="icon-bar"></span>'."\n";
            echo '                <span class="icon-bar"></span>'."\n";
            echo '                <span class="icon-bar"></span>'."\n";
            echo '                <span class="icon-bar"></span>'."\n";
            echo '            </button>'."\n";
            echo '            <a class="navbar-brand" href="#">ArchéoSite</a>'."\n";
            echo '        </div>'."\n";
            echo '        <div id="navbar" class="collapse navbar-collapse">'."\n";
            echo '            <ul class="nav navbar-nav">'."\n";
            echo '                <li'.($controller==''?' class="active"':'').'><a href="#">Home</a></li>'."\n";
            echo '                <li'.($controller=='search'?' class="active"':'').'><a href="search">Recherche</a></li>'."\n";
            echo '                <li'.($controller=='stats'?' class="active"':'').'><a href="stats">Stats</a></li>'."\n";
            echo '                <li'.($controller=='map'?' class="active"':'').'><a href="map/view">Maps</a></li>'."\n";
            echo '                <li class="dropdown">'."\n";
            echo '                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenue '.$user->login.'<b class="caret"></b></a>'."\n";
            echo '                    <ul class="dropdown-menu">'."\n";
            echo '                        <li><a href="user/info/'.$user->iduser.'">Votre compte</a></li>'."\n";
            echo '                        <li class="divider"></li>'."\n";
            echo '                        <li><a href="user/logout">Déconnexion</a></li>'."\n";
            echo '                    </ul>'."\n";
            echo '                </li>'."\n";
            echo '            </ul>'."\n";
            echo '        </div>'."\n";
            echo '    </div>'."\n";
            echo '</nav>'."\n";
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
            echo '                </ul>';
            echo '               <form class="navbar-form navbar-right" action="user/login" method="POST">';
            echo '                   <div class="form-group">';
            echo '                       <input type="text" name="login" placeholder="Identifiant" class="form-control">';
            echo '                   </div>';
            echo '                   <div class="form-group">';
            echo '                       <input type="password" name="password" placeholder="Mot de Passe" class="form-control">';
            echo '                   </div>';
            echo '                   <button type="submit" class="btn btn-success" name="validerLogin">Se connecter</button>';
            echo '               </form>';
            echo '            </div>';
            echo '        </div>';
            echo '    </nav>'."\n";
          if (isset($_GET['message'])) {echo "<p>".$_GET['message']."</p>";}
        }
?>
    <div class="container">
        <div class="row">'
            <div class="col-sm-2">
                <div class="sidebar-module sidebar-module-inset">
                    <?php echo $leftcontent."\n"; ?>
                </div>
            </div>
            <div class="col-sm-8">
                <?php echo $content."\n"; ?>
            </div>
        </div>
        <hr>
        <footer>
<?php echo $footer."\n"; ?>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
if (isset($scripts)) {
    foreach ($scripts as $script){
        echo $script."\n";
    }
}
?>
     </body>
</html>

<?php
// page title
$title = "Stats des Sites";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharpbunny, Inc.</p>';
// buffer init
ob_start();
// le code html qui va suivre ne sera pas envoyé à l'écran mais dans un buffer pour être envoyé au template
$links = array(); // tableau pour stocker les css supplémentaires
$links[]='<link href="Assets/CSS/statsView.css" rel="stylesheet">';
?>


        <!-- <h1>ArcheologieWeb</h1>-->

        <!-- Formulaire permettant de choisir la statistique à afficher-->
        <form action="stats/view" method="post">
            <select name="listeStats">
                <option value="themeChart" name="themeChart">Statistiques des thèmes d'intervention</option>
            </select>
            <input type="Submit" name="chartSubmit" value="Afficher le graphique">
        </form>
<?php
// store buffer into $content
$leftcontent = ob_get_clean();
ob_start();

echo '        <!-- Div contenant les graphiques -->';
//if (isset($_GET['stats']) && $_GET['stats'] == true) {

               // }
    //Si c'est le graphique concernant les thèmes qui a été demandé
    //if (isset($_GET['theme'])) {
        //echo '<script type="text/javascript" language="javascript">';
        //echo 'var theme = '.$_GET['theme'];
        //echo '</script>';


    //}
    echo '<div id="graphContainer">
                <div id="chartDiv">
                    <canvas id="ArcheoChart" width="100" height="100" class="plot"></canvas>        
                </div>

                <div id="pieDiv">
                    <canvas id="ArcheoPie"></canvas>        
                </div>
            </div>';
//} else {
//    echo '<p>Vous n\'avez choisi aucune statistique.</p>';
//}

// store buffer into $content
$content = ob_get_clean();
$scripts = array(); // tableau pour stocker les scripts supplémentaires
$scripts[] = '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js" type="text/javascript"></script>';
$scripts[] = '<script src="Assets/JS/statsView.js" type="text/javascript"></script>';
// call template to display
include('Views/siteTemplate.php');

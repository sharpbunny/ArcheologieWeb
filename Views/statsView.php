<?php
// page title
$title = "Stats des Sites";
// page footer content
$footer = "Contenu bas de page";
// buffer init
ob_start();
// le code html qui va suivre ne sera pas envoyé à l'écran mais dans un buffer pour être envoyé au template
$links = array(); // tableau pour stocker les css supplémentaires
$links[]='<link href="Assets/CSS/statsView.css" rel="stylesheet">';
?>

<html id="html">

    <head>
        <meta charset="utf-8">
        <link href="../Assets/CSS/statsView.css" rel="stylesheet">
        <title></title>
    </head>

    <body>

        <!-- <h1>ArcheologieWeb</h1>-->
        
        <!-- Formulaire permettant de choisir la statistique à afficher-->
        <form action="index.php?action=stats" method="post">
            <select name="listeStats">
                <option value="themeChart" name="themeChart">Statistiques des thèmes d'intervention</option>
            </select>
            <input type="Submit" name="chartSubmit" value="Afficher le graphique">
        </form>


        <!-- Div contenant les graphiques -->
        <?php 
            if(isset($_GET['stats']) && $_GET['stats'] == true){

                //Si c'est le graphique concernant les thèmes qui a été demandé
                if(isset($_GET['theme'])){
                    ?><script type="text/javascript" language="javascript">
                        var theme = <?php echo $_GET['theme']; ?>
                    </script>

        <?php
                }


                echo'<div id="graphContainer">
                <div id="chartDiv">
                    <canvas id="ArcheoChart" width="100" height="100"></canvas>        
                    </div>

                    <div id="pieDiv">
                        <canvas id="ArcheoPie"></canvas>        
                    </div>
                </div>';
            }

            else{
                echo '<p>Vous n\'avez choisi aucune statistique.</p>';
            }

        ?>

<?php
// store buffer into $content
$content = ob_get_clean();
$scripts = array(); // tableau pour stocker les scripts supplémentaires
$scripts[] = '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js" type="text/javascript"></script> <!-- Librairie chartjs-->';
$scripts[] = '<script src="Assets/JS/statsView.js" type="text/javascript"></script>';
// call template to display
include('Views/siteTemplate.php');

?>
<?php
// page title
$title = "Carte des Sites";
// page footer content
$footer = "Contenu bas de page";
// buffer init
//$links=array();
//$links[]='<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />';
ob_start();
?>
<style>
		#map {
			width: 600px;
			height: 400px;
		}
	</style>
<div id="map"></div>

<?php

?>
<!DOCTYPE HTML>
<html>

<head>
        <title>Titre principal de la page</title>
        <meta charset="utf-8">
        <meta name="description" content="165c. uniques">
        <link rel="stylesheet" href="../Assets/CSS/mapView.css">
        <!--<link rel="stylesheet" href="../Assets/CSS/mapView.css/leaflet.css" />-->
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
        <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
        <script src="../Assets/JS/leaflet.js"></script>
</head>

<body>
    <div id="page">
        <div id="centrerPage">
                <div id="gauche">
            <!-- DIV : Aucun sens sémantique - zone géographique -->
            
                <header><!-- Entête de la zone considérée --></header>
                <nav><!-- Nav. principale de la page -> site --></nav>        
                <aside><!-- Les à-cotés de la page --></aside>
                <article><!-- Contenu textuel de la page -->
                <p>Bienvenue dans l'explorateur de carte.</p>
                
                </article>
                <footer><!-- Pied-de-page de la page -> site --></footer>
                </div>

                <div id="droite">
                    <div id="map">
                     <script>
                         onload="InitialiserCarte() ;"
                     </script>  
                            
                     
                    </div>
                <?php  ?>
                </div>
        </div>
    </div>
</body>
<script src="../Assets/JS/leaflet.js"></script>
<script src="../Assets/JS/mapView.js"></script>
</html>
<?php
// store buffer into $content
$content = ob_get_clean();
// call template to display
include('../Views/siteTemplate.php');

?>


<?php
// page title
$title = "Carte des Sites";
// page footer content
$footer = '<p class="text-muted credit">Contenu bas de page</p>';
// buffer init
$links=array();
$links[]='<link rel="stylesheet" href="Assets/CSS/mapView.css">';
$links[]='<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />';
ob_start();
?>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <div id="page">
        <div id="centrerPage">
            <div id="gauche">
            </div>
            <div id="droite">
                <div id="map">
                    <script>
                        onload="InitialiserCarte() ;"
                    </script>  
                </div>
            </div>
        </div>
    </div>
<script src="Assets/JS/mapView.js"></script>

<?php
// store buffer into $content
$content = ob_get_clean();
// call template to display
include('Views/siteTemplate.php');

?>


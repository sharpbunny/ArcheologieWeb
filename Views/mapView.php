<?php
// page title
$title = "Carte des Sites";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharbunny, Inc.</p>';
// buffer init
$links=array();
$links[]='<link rel="stylesheet" href="Assets/CSS/mapView.css">';
$links[]='<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />';
// left side
ob_start();

                   
                                    
$leftcontent = ob_get_clean();
// main of page
ob_start();
echo'<div id="mapviewcentral">
        <div id="coordonne">
            <div id="listDesSites"><p></p>
            </div>
              <div id="rowinput">
                    <input class="navsite g" id="gauche" value="gauche" type="submit">
                    <input class="navsite d" id="droite" value="droite" type="submit">
              </div>
                   <input id="activerpointeur" type="submit" value="pointeur" href="mapController.php">;
        </div>
          <div id="columninput">
             <div id="lesite">
             </div>
             <div id="map">
             </div>
          </div>
     </div>';
// store buffer into $content
$content = ob_get_clean();


// include scripts with template
$scripts=array();
$scripts[]='<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>';
$scripts[]='<script src="Assets/JS/mapView.js"></script>';
// call template to display
include('Views/siteTemplate.php');

?>


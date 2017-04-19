<?php
//FIXME move to view
// page title
$title = "Recherche de Sites";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharpbunny, Inc.</p>';
// buffer init
ob_start();
// le code html qui va suivre ne sera pas envoyé à l'écran mais dans un buffer pour être envoyé au template
?>
        <div id="divBarreRecherche">
            <fieldset>
                <form action="search/view" method="POST">
                <label>Champ de recherche</label>
                <input id="barreRecherche" name="researchField" type="text"></input>
                <input id="submitResearch" type="submit"></input>
                </form>
            </fieldset>
            
        </div>
<?php
// store buffer into $leftcontent
$leftcontent = ob_get_clean();
// strart new buffer
ob_start();
?>
        <div id="resultatRecherche">
                <table>
<?php
if(!(isset($arraySearch))){
        echo "Remplissez le champ de gauche";
}
else{
$i = 0;
while($i < count($arraySearch)){
        echo '<div class ="researchResult">';
        echo '<a href="detail/view/'.$arraySearch[$i]["ID_site"].'">Identifiant du site = '.$arraySearch[$i]["ID_site"].' </a>';
        echo "<br>";
        echo "Nom du Site = ".$arraySearch[$i]['nom_site'];
        echo "<br>";
        echo "ID de la commune = ".$arraySearch[$i]['ID_commune'];
        echo "</div>";
        $i++;
        }
}
?>

                </table>
        </div>
<?php
// store buffer into $content
$content = ob_get_clean();

// call template to display
include('Views/siteTemplate.php');

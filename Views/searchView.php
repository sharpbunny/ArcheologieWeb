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
if (isset($arraySearch)) var_dump($arraySearch);
?>

                </table>
        </div>
<?php
// store buffer into $content
$content = ob_get_clean();

// call template to display
include('Views/siteTemplate.php');

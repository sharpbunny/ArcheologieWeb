<?php 
//FIXME move to view
// page title
$title = "Recherche de Sites";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharbunny, Inc.</p>';
// buffer init
ob_start();
// le code html qui va suivre ne sera pas envoyé à l'écran mais dans un buffer pour être envoyé au template
?>


    <div class="container" id="blocRecherche">
        <div id="divBarreRecherche">
            <fieldset>
                <form action="researchView.php" method="POST">
                <label>Champ de recherche</label>
                <input id="barreRecherche" name="researchField" type="text"></input>
                <input id="submitResearch" type="submit"></input>
                </form>
            </fieldset>
            
        </div>
        <div id="resultatRecherche">
                <table>

                </table>
         <?php
         //Insertion du Controlleur dans la vue
         //include("controllers/researchController.php");
         //Research::jeanpierre($_POST['researchField']);
         ?>
        </div>
    </div>
<?php
// store buffer into $content
$content = ob_get_clean();

// call template to display
include('Views/siteTemplate.php');

?>
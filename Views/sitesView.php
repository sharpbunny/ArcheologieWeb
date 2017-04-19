<?php
// page title
$title = "Recherche par Sites";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharpbunny, Inc.</p>';
// buffer init
$links=array();
$links[]='<link rel="stylesheet" href="Assets/CSS/bootcomplete.css">';
// left side
require_once "Model/sitesModel.php";

ob_start();
?>
        <div id="divGauche">
            <p>Recherche</p>
            <form method='POST' action="sites/view">
                <SELECT id="departement" class="menuD" name ="dpt" size="1">
                    <option>*Choisissez votre département*                    
                    <?php Site::MenuDDepartement(); ?>                             
                </SELECT>
                <br>
                <SELECT id="ville" class="menuD" name ="vil" size="1">
                    <option>*Choisissez votre ville*
                    <?php Site::MenuDVille(); ?>               
                </SELECT>
                <br>
                <input type='submit'>
            </form>
            <br>
<input id="jsdepartement" type="text" name="departement" placeholder="Entrez un département" class="form-control">
<br>
<input id="jsville" type="text" name="ville" placeholder="Entrez une ville" class="form-control">
                
        </div>
<?php
// store buffer into $content
$leftcontent = ob_get_clean();
ob_start();
?>
        <div id="divDroite">
            <table class="table">
                <tr>
                <th id='nomDpt'>Nom/Département</th>
                <th id='nSite'>Nom du Site</th>
                <th>Libellé période</th>
                <th class='date'>Date de début</th>
                <th class='date'>Date de fin</th>
                </tr>
<?php
if (isset($_POST['dpt'])) 
{ 
    $dptSelectionne = htmlspecialchars($_POST['dpt']);
    Site::FiltreParDpt($dptSelectionne);
}

if (isset($_POST['vil'])) {
    $villeSelectionnee = htmlspecialchars($_POST['vil']);
    Site::FiltreParVille($villeSelectionnee);
}
?>
            </table>
        </div>
<?php
// store buffer into $content
$content = ob_get_clean();


// include scripts with template
$scripts = array();
$scripts[] = '<script src="Assets/JS/jquery.bootcomplete.js"></script>';
$scripts[] = '<script src="Assets/JS/searchView.js"></script>';
// call template to display
include('Views/siteTemplate.php');

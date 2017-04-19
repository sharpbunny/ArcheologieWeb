<?php
// page title
$title = "Détail du Site";
// page footer content
$footer = '<p class="text-muted credit">&copy; 2017 Sharpbunny, Inc.</p>';
// buffer init
// left side
ob_start();
?>
    <div id="divDeGauche">
        <h3> Détail du site d'intervention</h3>
        <p> Pays : France </p>
        <p id="TitreRegionPlusImage">Région : Île-de-France </p>
        <!--<img src="RegionIDF.png" alt="Détail de la région île de France" title ="Zone géographique des sites archéologiques">-->
        <!--<p>Localisation :</p>
        <ul>
            <li id="LongitudeChoisi"> Longitude : <?php if (isset($TableauEstBienRempli)) echo $TableauEstBienRempli["longitude"]; ?></li>
            <li id="LatitudeChoisi"> Latitude : <?php if (isset($TableauEstBienRempli)) echo $TableauEstBienRempli["latitude"]; ?></li>
        </ul>-->
       
    </div>
<?php
$leftcontent = ob_get_clean();
// main of page
ob_start();
?>
    <div class="container">
        <!-- <img  id="MonImage" src="Assets/Images/Ruine.jpg" alt="Ruine de Bavay" title="Site archélogique choisi"> -->
    <iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://cartosm.eu/map?lon=<?php echo $TableauEstBienRempli["longitude"]; ?>&lat=<?php echo $TableauEstBienRempli["latitude"]; ?>&zoom=12&width=640&height=480&mark=true&nav=true&pan=true&zb=inout&style=default&icon=down"></iframe>
    </div>
    <div class="container">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Détail du site de fouille : <?php if (isset($TableauEstBienRempli)) echo $TableauEstBienRempli["nomCommune"]; ?> </div>
            <!-- Table -->
            <table class="table">
                <tr>
                    <th>Localisation</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td>  Longitude : <?php  if (isset($TableauEstBienRempli)) echo $TableauEstBienRempli["longitude"]; ?></td>
                    <td> <?php if (isset($TableauEstBienRempli)) echo $TableauEstBienRempli["nom_site"]; ?> </td>
                </tr>
                <tr>
                    <td>   Latitude :<?php if (isset($TableauEstBienRempli)) echo $TableauEstBienRempli["latitude"]; ?></td>
                   <td>Type d'intervention : <?php if (isset($DonneesIntervention)) echo $DonneesIntervention["libelleIntervention"]; ?> </td>
                    
                <tr>
                
                    <td>Période concernée :  <?php if(isset($DonneesPeriode)) echo $DonneesPeriode["libellePeriode"]; ?> </td>
                    <td>Date intervention(début/fin): 
                     <?php $dateDebut = new DateTime($DateIntervention['date_debut']);
                     $dateFin = new DateTime($DateIntervention['date_fin']);
                     $dateFin->format('d-m-Y'); 
                     echo $dateDebut->format('d-m-Y').' '.$dateFin->format('d-m-Y')?>;      
                    </td>
                    
                </tr>
               
            </table>
        </div>
    </div>
<?php
// store buffer into $content
$content = ob_get_clean();

// include scripts with template
$scripts=array();
// call template to display

include('Views/siteTemplate.php');



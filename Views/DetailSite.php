<?php
require_once("../Model/DetailSiteModel.php");
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./Assets/CSS/DetailS.css">
</head>
<body>
    <div id="divDeGauche">
        <h1 id="TitreACliquer"> Détail du site d'intervention choisi </h1>
        <p> Pays : France </p>
        <p id="TitreRegionPlusImage">Région : Île-de-France </p>
        <!--<img src="RegionIDF.png" alt="Détail de la région île de France" title ="Zone géographique des sites archéologiques">-->
        <p>Localisation :
            <ul>
                <li id="LongitudeChoisi"> Longitude : 0.00 </li>
                <li id="LatitudeChoisi"> Latitude : 0.00 </li>
            </ul>
        </p>
        <p id="PeriodeChoisi">Période concernée : Paléolithique, Mésolithique, Néolithique, Âge du Bronze, Âge du Fer, Antiquité, Moyen Âge, Epoque moderne<p>
        <p id="EtatSiteChoisi"> Etat du site : (Transfert l'information de la BDD : Ouvert au public (périodes destinées, normes de protections.) || Fermé au public (En cours d'investigation, travaux, restauration.) </p>
        <p id="TypeSiteChoisi"> Type de site : (Transfert l'information de la BDD : Bâtiments, Ruines, Artefacts, Décorations)
    </div>
    <div id="divDuCentre">
    <img  id="MonImage" src="../Assets/Images/Ruine.jpg" alt="Ruine de Bavay" title="Site archélogique choisi">
    </div>
    <div id="divDeDroite">

        <button id="BoutonDeRemplissage">Remplir le tableau!</button>
        <form action="DetailSite.php" method="POST">   
            <table id="Tableau">
                <tr>
                    <td>Localisation</td>
                    <td>Nom du site</td>
                </tr>
                <tr>
                    <td>0.00</td>
                    <td>Site de fouille A  <button name="BoutonA">Choisir</button> </td>
                
                </tr>
                <tr>
                    <td>0.10</td>
                    <td>Site de fouille B<button id="BoutonB">Choisir</button></td>
                
                <tr>
                    <td>0.20</td>
                    <td>Site de fouille C<button id="BoutonC">Choisir</button></td>
                    
                </tr>
                <tr>
                    
                    <td>0.30</td>
                    <td>Site de fouille D<button id="BoutonD">Choisir</button></td>
                    
                </tr>
            </table>
        </form>
    </div> 
</body>
</html>
    
   

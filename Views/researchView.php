<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../stylesheet.css">
</head>

<body id="bodyRecherche">
    <div id="blocRecherche">
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
         include("../controllers/researchController.php");
         Research::jeanpierre($_POST['researchField']);
         ?>
        </div>
    </div>
</body>
<script></script>
</html>
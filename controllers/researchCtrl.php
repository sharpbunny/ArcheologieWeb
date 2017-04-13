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
                <form action="POST">
                <label>Champ de recherche</label>
                <input id="barreRecherche" name="researchField" type="text"></input>
                </form>
            </fieldset>
            <?php
            include("researchSQLAccess.php");
            ?>
        </div>
        <div id="resultatRecherche">
                <table>

                </table>
         
        </div>
    </div>
</body>
<script></script>
</html>
<! doctype html>

<html>

    <head>
    <!-- Vérifier si on doit le laisser dans le head ou le mettre dans le body -->
        <meta charset="utf-8">
        <link href="../Assets/CSS/statsView.css" rel="stylesheet">
        <title></title>
    </head>

    <body>
        <h1>ArcheologieWeb</h1>
        
        <!-- Formulaire permettant de choisir la statistique à afficher-->
        <form action="../Controllers/statsController.php" method="post">
            <select name="listeStats">
                <option value="themeChart" name="themeChart">Statistiques des thèmes d'intervention' </option>
            </select>
            <input type="Submit" name="chartSubmit" value="Afficher le graphique">
        </form>


        <!-- Div contenant les graphiques -->
        <?php 
            if(isset($_GET['stats']) && $_GET['stats'] == true){
                echo'<div id="graphContainer">
                <div id="chartDiv">
                    <canvas id="ArcheoChart" width="100" height="100"></canvas>        
                    </div>

                    <div id="pieDiv">
                        <canvas id="ArcheoPie"></canvas>        
                    </div>
                </div>';
            }

            else{
                echo '<p>Vous n\'avez choisi aucune statistique.</p>';
            }

        ?>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js" type="text/javascript"></script> <!-- Librairie chartjs-->
        <script src="../Assets/JS/statsView.js" type="text/javascript"></script>
    </body>

</html>
<?php 
require_once("Model/User.php");

session_start();

$user = new User();

$getpost = array_merge($_GET, $_POST);
$action = htmlspecialchars(isset($getpost['action'])?$getpost['action']:"");

if (!isset($_SESSION["iduser"]))
{
    if (!isset($_POST["validerLogin"]))
    {
        require_once('Controllers/LoginController.php');
        Login::DisplayLoginView();
    }
    if (isset($_POST["validerLogin"]))
    {
        $login = htmlspecialchars($getpost['pseudoLogin']);
        $password = htmlspecialchars($getpost['passwordLogin']);
        $user->CheckUser($login, $password);
        header("Location: ./index.php");
    }

}
else
{
    $user->getUser($_SESSION["iduser"]);

    if (isset($_POST["deco"]))
    {
        $user->DeconnexionUser();
        header("Location: ./index.php");
    }
    else
    {
        if ($action == "search") {
            // Research ctrl
            require_once('Controllers/researchController.php');
            Research::DisplaySearchView();
        } else if ($action == "stats"){
            // stats
            require_once('Controllers/statsController.php');
            Stats::DisplayStatsView();
        } else {
            // map
            require_once('Controllers/mapController.php');
            Map::DisplayMapView();
        }
    }
}

?>

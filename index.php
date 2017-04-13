<?php 
session_start();

$getpost = array_merge($_GET, $_POST);
$action = htmlspecialchars($getpost['action']);

if (!isset($_SESSION["iduser"]))
{
    if (!isset($_POST["validerLogin"]))
    {
        require_once('Controllers/LoginController.php');
        Login::DisplayLoginView();
    }
    if (isset($_POST["validerLogin"]))
    {
        require_once("Model/User.php");
        User::ConnexionUser();
        header("Location: ./index.php");
    }

}
else
{

    if (isset($_POST["deco"]))
    {
        require_once("Model/User.php");
        User::DeconnexionUser();
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
        } else if ($action == "map"){
            // map
            require_once('Controllers/mapController.php');
            Map::DisplayMapView();
        }
        
        
        require_once('Controllers/LoginController.php');
        Login::DisplayDeconnexion();
    }
}

<?php 
session_start();

$getpost = array_merge($_GET, $_POST);
$action = htmlspecialchars($getpost['action']);

if (!isset($_SESSION["iduser"]))                             //check if session does not exist
{
    if (!isset($_POST["validerLogin"]))                      //"validerLogin" does not exist
    {
        require_once('Controllers/LoginController.php');     
        Login::DisplayLoginView();                           // load view login
    }
    if (isset($_POST["validerLogin"]))                       //  "validerLogin exists
    {
        require_once("Model/User.php");
        User::ConnexionUser();                              // load user connexion view
        header("Location: ./index.php");                    
    }
}
else                                                         // else if session exists                                                  
{
    if (isset($_POST["deco"]))                               // TODO : use a more explicit world 
    {
        require_once("Model/User.php");
        User::DeconnexionUser();                             // load deconnexion user
        header("Location: ./index.php");
    }
    else                                                     // No deconnexion expected
    {
        switch ($action)                                     // check action passed through url 
        {                                                    // my.domain.com/action?='myAction'
            case 'search':                                   // case = search page request 
                // Research ctrl
                require_once('Controllers/researchController.php');
                Research::DisplaySearchView();
                break;
            case 'stats':                                     // case = stats page request
                //code
                break; 
            case 'map':                                       // case = map page request
                // map
                require_once('Controllers/mapController.php');
                Map::DisplayMapView();
                break; 
            default:                                           // TODO : add page default
                # code...
                break;
        }
        
        require_once('Controllers/LoginController.php');       // FIXME : is it still needed?
        Login::DisplayDeconnexion();
    }
}

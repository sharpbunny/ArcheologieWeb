<?php 
require_once("Model/User.php");

session_start();

$user = new User();

$getpost = array_merge($_GET, $_POST);
$action = htmlspecialchars(isset($getpost['action'])?$getpost['action']:"");

if (!isset($_SESSION["iduser"]))                             //check if session does not exist
{
    if (!isset($_POST["validerLogin"]))                      //"validerLogin" does not exist
    {
        require_once('Controllers/LoginController.php');     
        Login::DisplayLoginView();                           // load view login
    }
    if (isset($_POST["validerLogin"]))                       // "validerLogin" exists
    {
        $login = htmlspecialchars($getpost['pseudoLogin']);
        $password = htmlspecialchars($getpost['passwordLogin']);
        $user->CheckUser($login, $password);                  // load user connexion view
        header("Location: ./index.php");
    }
}
else                                                         // else if session exists                                                  
{
    $user->getUser($_SESSION["iduser"]);

    if (isset($_POST["deco"]))                               // TODO : use a more explicit world 
    {
        $user->DeconnexionUser();                            // load deconnexion user
        header("Location: ./index.php");
    }
    else                                                     // No deconnexion expected
    {
        switch ($action)                                     // check action passed through url 
        {                                                    // my.domain.com/action?='myAction'
            case 'stats':                                    // case = stats page request
                //code
                require_once('Controllers/statsController.php');
                Stats::DisplayStatsView();
                break; 
            case 'map':                                       // case = map page request
                // map
                require_once('Controllers/mapController.php');
                Map::DisplayMapView();
                break; 
            case 'search':                                   // case = search page request 
            default:                                           // TODO : add page default
                // Research ctrl
                require_once('Controllers/researchController.php');
                Research::DisplaySearchView();
                break;
        }
    }
}

?>

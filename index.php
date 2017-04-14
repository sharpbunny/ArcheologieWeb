<?php 
require_once("Model/userModel.php");

session_start();

$user = new User();

$getpost = array_merge($_GET, $_POST);

$controller = htmlspecialchars(isset($getpost['controller'])?$getpost['controller']:"");
$action = htmlspecialchars(isset($getpost['action'])?$getpost['action']:"");
$id = htmlspecialchars(isset($getpost['id'])?$getpost['id']:"");
$login = htmlspecialchars(isset($getpost['pseudoLogin'])?$getpost['pseudoLogin']:"");
$password = htmlspecialchars(isset($getpost['passwordLogin'])?$getpost['passwordLogin']:"");

$user->getUser($_SESSION["iduser"]);

// check action passed through url
// my.domain.com/controller/action/id
switch ($controller)
{
    case 'user':
        // user
        require_once('Controllers/userController.php');
        if ($action=='login') {
            // load user connexion view
            $user->loginUser($login, $password);
            header("Location: .");
        } else if ($action=='logout') {
            // load deconnexion user
            $user->logoutUser();
            header("Location: .");
        } else {
            // display user info
            $user->getUser($id);
            userController::userView();
        }
        break;
    case 'stats':                                    // case = stats page request
        //code
        require_once('Controllers/statsController.php');
        Stats::DisplayStatsView();
        break; 
    case 'map':                                       // case = map page request
        // map
        require_once('Controllers/mapController.php');
        if ($action=='json') {
            Map::SendJson();
        } else {
            //$action=='view'
            Map::DisplayMapView();
        }
        break; 
    case 'search':                                   // case = search page request 
    default:                                           // TODO : add page default
        // Research ctrl
        require_once('Controllers/researchController.php');
        Research::DisplaySearchView();
        break;
}

?>

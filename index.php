<?php 
require_once("Model/userModel.php");

session_start();

$getpost = array_merge($_GET, $_POST);

$controller = htmlspecialchars(isset($getpost['controller'])?$getpost['controller']:"");
$action = htmlspecialchars(isset($getpost['action'])?$getpost['action']:"");
$id = htmlspecialchars(isset($getpost['id'])?$getpost['id']:"");
$login = htmlspecialchars(isset($getpost['login'])?$getpost['login']:"");
$password = htmlspecialchars(isset($getpost['password'])?$getpost['password']:"");
$iduser = htmlspecialchars(isset($_SESSION["iduser"])?$_SESSION["iduser"]:"");

$user = new User();
$user->getUser($iduser);

if ($controller != 'user' && $action != 'login' && $user->iduser == 0 ) {
    $controller = 'user';
    $action='';
}

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
            UserController::userView();
        }
        break;
    case 'stats':                                    // case = stats page request
        //code
        require_once('Controllers/statsController.php');
        Stats::DisplayStatsView();
        break; 
    case 'detail':                                    // case = stats page request
        //code
        require_once('Controllers/detailController.php');
        DetailController::DisplayDetailView();
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
        // Research ctrl
        require_once('Controllers/searchController.php');
        SearchController::DisplaySearchView();
        break;
    default:                                           // TODO : add page default
        // user ctrl
        require_once('Controllers/userController.php');
        UserController::userView();
        break;
}

?>

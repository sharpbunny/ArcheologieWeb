<?php
/**
 * Router for all controllers actions
 */
require_once "Model/userModel.php";

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

if ($controller != 'user' && $action != 'login' && $user->iduser == 0) {
    $controller = 'user';
    $action='';
}

// check action passed through url
// my.domain.com/controller/action/id
switch ($controller) {
    case 'user':
        // user
        include_once "Controllers/userController.php";
        if ($action=='login') {
            // load user connexion view
            $user->loginUser($login, $password);
            header("Location: .");
        } elseif ($action=='logout') {
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
        include_once "Controllers/statsController.php";
        Stats::DisplayStatsView();
        break;
    case 'detail':                                    // case = stats page request
        //code
        include_once "Controllers/detailController.php";
        DetailController::DisplayDetailView();
        break;
    case 'map':                                       // case = map page request
        // map
        include_once "Controllers/mapController.php";
        if ($action=='json') {
            Map::sendJson();
        } else {
            //$action=='view'
            Map::displayMapView();
        }
        break;
    case 'search':                                   // case = search page request
        // Research ctrl
        include_once "Controllers/searchController.php";
        if ($action=='view') {
            SearchController::DisplayResultSearchView();
        } else {
            SearchController::DisplaySearchView();
        }
        break;
    default:                                           // TODO : add page default
        // user ctrl
        include_once "Controllers/userController.php";
        UserController::userView();
        break;
}

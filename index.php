<?php 
session_start();

if (!isset($_SESSION["iduser"]))
{
    if (!isset($_POST["validerLogin"]))
    {
        require_once('Controllers/LoginCtrl.php');
        Login::DisplayLoginView();
    }
    if (isset($_POST["validerLogin"]))
    {
        require_once("Model/User.php");
        User::ConnexionUser();
    }
    
}
else
{
    // Research ctrl
    require_once('Controllers/LoginCtrl.php');
    Login::DisplayLoginView();
}

?>

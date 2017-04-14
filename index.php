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
        // Research ctrl
        require_once('Controllers/researchController.php');

        require_once('Controllers/LoginCtrl.php');
        Login::DisplayDeconnexion();
    }
}

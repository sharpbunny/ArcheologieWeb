<?php
/**
* In charge of displaying first login connexion and deconnexion button
*/
class UserController
{
    /**
     * Display login view 
     */
    static public function userView()
    {
        global $user, $basehref;
        require_once("./Views/userView.php");
    }

    /**
     * Display view to deconnect
     */
    static public function DisplayDeconnexion()
    {
        require_once("./Views/deconnexionButton.html");
    }
}

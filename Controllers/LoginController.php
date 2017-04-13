<?php 
/**
* In charge of displaying first login connexion and deconnexion button
*/
class Login 
{
	/**
	 * Display login view 
	 */
	static public function DisplayLoginView()
	{
        global $user;
        require_once("./Views/login.php");
	}

	/**
	 * Display view to deconnect
	 */
	static public function DisplayDeconnexion()
	{
		require_once("./Views/deconnexionButton.html");
	}
}
?>

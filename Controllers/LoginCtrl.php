<?php 
// First Login Controller.
class Login 
{
	/**
	 * display login view 
	 */
	static public function DisplayLoginView()
	{
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

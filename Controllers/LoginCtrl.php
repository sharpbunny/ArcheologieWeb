<?php 
// First Login Controller.
class Login {

	static public function DisplayLoginView()
	{
		require_once("./Views/login.php");
	}

	static public function DisplayDeconnexion()
	{
		require_once("./Views/deconnexionButton.html");
	}
}
?>

<?php 
// First Login Controller.
//FIXME : create class

if ( !isset( $_SESSION["id"] ) ) {
	if ( !isset( $_POST["validerLogin"] ) )
	{
		include("./Views/login.php");
	}
	else if ( isset( $_POST["validerLogin"] ) and isset( $_POST["pseudoLogin"] ) and isset( $_POST["passwordLogin"] ) )
	{
		include("./Model/User.php");
	}
}


?>

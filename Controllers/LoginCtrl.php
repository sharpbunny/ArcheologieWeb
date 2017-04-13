<?php 
// First Login Controller.
//FIXME : create class
require("./Model/Connector.php");
class Login {

	static public function DisplayLoginView() {
		ArcheoPDO::Connect();
		ArcheoPDO::Disconnect();
	}
}

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

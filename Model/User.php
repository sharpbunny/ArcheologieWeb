<?php
//FIXME : add class
if ( !isset( $_SESSION["id"] ) )
{
	if ( !isset( $_POST["validerLogin"] ) )
	{
		include("./Views/login.php");
	}
	else if ( isset( $_POST["validerLogin"] ) and isset( $_POST["pseudoLogin"] ) and isset( $_POST["passwordLogin"] ) )
	{
		$login = $_POST["pseudoLogin"];
        $password = md5($_POST["passwordLogin"]);
        $exist = false;

        // Test de l'existance sur la base de donnée.

        // Si la personne existe.
        if ($exist) 
        {
            $_SESSION["id"] = "id";// bdd id;
            $_SESSION["pseudo"] = "pseudo";// bdd pseudo;
        }
        else 
        {
            header("Location: ./index.php?error_login=badlogin");
        }
	}
}

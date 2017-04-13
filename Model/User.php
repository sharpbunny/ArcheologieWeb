<?php
//FIXME : rename file with Model suffix 
/**
* Model to request user table
*/
class User
{
    /**
     * Check if user exists in the bdd.
     * @param string user's login
     * @param string user's password 
     * @return mixed boolean or iduser.
     */
    private static function CheckUser( $login, $password)
    {
        require_once("./Model/Connector.php");
        $exist = false;
        
        $pdo = ArcheoPDO::Connect();

		$select = $pdo->query("SELECT iduser FROM users WHERE username='$login' AND userpass='$password'");
        $select = $select->fetch();

       if ($select[0] != false)
       {
           $exist = $select[0];
       }

		ArcheoPDO::Disconnect();

        return $exist;
    }

    /**
     * Connect user.
     * FIXME : what  this function actually does ?
     */
    public static function ConnexionUser()
    {
        $login = $_POST["pseudoLogin"];
        $password = md5($_POST["passwordLogin"]);
         // Test de l'existance sur la base de donnée.
        $exist = User::CheckUser($login, $password);
        // Si la personne existe.
        if ($exist != false) 
        {
            $_SESSION["iduser"] = $exist;
            $_SESSION["pseudo"] = $login;
        }
        else 
        {
            header("Location: ./index.php?error_login=badlogin");
        }
    }

    /**
    * FIXME : what  this function actually does ?
    */
    public static function DeconnexionUser()
    {
        session_unset();
        session_destroy();
    }
}

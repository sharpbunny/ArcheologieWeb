<?php
//FIXME : rename file with Model suffix 
/**
* Model to request user table
*/
class User
{
    public $iduser = 0;
    public $login;
    public $rankingaccess;

    function __construct()
    {

    }

    /**
     * Get user info in the bdd.
     * @param string user's id
     */
    public function getUser($iduser)
    {
        global $user;
        require_once("./Model/Connector.php");
        
        $pdo = ArcheoPDO::Connect();
        $select = $pdo->query("SELECT iduser, username, rankingaccess FROM users WHERE iduser='".$iduser."'");
        $result = $select->fetch();
        if (!empty($result))
        {
            $user->iduser = $result['iduser'];
            $user->login = $result['username'];
            $user->rankingaccess = $result['rankingaccess'];
        }
    }

    /**
     * Check if user exist in the bdd.
     * @param string user login
     * @param string user password
     */
    public function CheckUser($login, $password)
    {
        require_once("./Model/Connector.php");

        $pdo = ArcheoPDO::Connect();

        $select = $pdo->query("SELECT iduser, username, rankingaccess FROM users WHERE username='$login' AND userpass='".md5($password)."'");
        $result = $select->fetch();

        if (!empty($result))
        {
            $this->iduser = $result['iduser'];
            $this->login = $result['username'];
            $this->rankingaccess = $result['rankingaccess'];
            $_SESSION["iduser"] = $result['iduser'];
            $_SESSION["pseudo"] = $login;
            $_SESSION["rankingaccess"] = $result['rankingaccess'];
       }

		ArcheoPDO::Disconnect();

    }

    /**
    * FIXME : what  this function actually does ?
    */
    public static function DeconnexionUser()
    {
        $user = null;
        session_unset();
        session_destroy();
    }
}

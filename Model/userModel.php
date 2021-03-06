<?php

/**
* Model to request user table
*/
class User
{
    public $iduser = 0;
    public $login;
    public $rankingaccess;
    public $error;

    function __construct()
    {

    }

    /**
     * Get user info in the bdd.
     * @param string $iduser user's id
     */
    public function getUser($iduser)
    {
        global $user;
        require_once("./Model/Connector.php");
        
        $pdo = ArcheoPDO::Connect();
        $select = $pdo->query("SELECT iduser, username, rankingaccess FROM users WHERE iduser=".(int)$iduser);
        $result = $select->fetch();
        if (!empty($result))
        {
            $user->iduser = $result['iduser'];
            $user->login = $result['username'];
            $user->rankingaccess = $result['rankingaccess'];
            $user->error = "";
        }

        ArcheoPDO::Disconnect();

    }

    /**
     * Check if user exist in the bdd.
     * @param string $login user login
     * @param string $password user password
     */
    public function loginUser($login, $password)
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
       } else {
           $this->error ="Utilisateur inconnu";
       }

        ArcheoPDO::Disconnect();

    }

    /**
     * Destroy object $user and destroy the current session.
     */
    public static function logoutUser()
    {
        $user = null;
        session_unset();
        session_destroy();
    }
}

<?php

class User
{
    public $iduser = 0;
    public $login;
    public $rankingaccess;

    function __construct()
    {

    }

    /**
     * Check if user exist in the bdd.
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
     */
    public function CheckUser($login, $password)
    {
        require_once("./Model/Connector.php");
        
        $pdo = ArcheoPDO::Connect();

        $select = $pdo->query("SELECT iduser, username, rankingaccess FROM users WHERE username='$login' AND userpass='".md5($password)."'");
        $result = $select->fetch();

        if (!empty($result))
        {
            $user->iduser = $result['iduser'];
            $user->login = $result['username'];
            $user->rankingaccess = $result['rankingaccess'];
            $_SESSION["iduser"] = $result['iduser'];
            $_SESSION["pseudo"] = $login;
            $_SESSION["rankingaccess"] = $result['rankingaccess'];
       }

		ArcheoPDO::Disconnect();

    }

    public static function DeconnexionUser()
    {
        $user->iduser = 0;
        $user->login = null;
        $user->rankingaccess = null;
        session_unset();
        session_destroy();
    }
}

<?php
/**
* Connector to manage connection and disconnection to database
*/
class ArcheoPDO
{
    /**
    * PDO Attribute activated by new PDO
    */
    private $mysqlPDO;

    /**
    * function to connect to bdd 
    * @return PDO
    */
    public static function Connect() 
    {
        // if conf.php doesn't exists you need to create from model conf/conf.php.dist
        include("conf/conf.php");

        try
        {
            $mysqlPDO = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8",
            $user, $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        { // en cas erreur on affiche un message et on arrete tout
            die('<h1>Erreur de connexion : </h1>' . $e->getMessage());
        }
        return $mysqlPDO;
    }

    /**
    * function which disconnects bdd 
    */
    public static function Disconnect() 
    {
        // TODO : disconnect BDD
        $mysqlPDO = null;
    }
}

?>

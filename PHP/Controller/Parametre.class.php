<?php
class Parametre
{
    private static $adresseRoot;
    private static $serverRoot;
    private static $host;
    private static $port;
    private static $dbname;
    private static $login;
    private static $pwd;
    /**
     * Get the value of adresseRoot
     */
    public static function getAdresseRoot()
    {
        return Parametre::$adresseRoot;
    }

    /**
     * Get the value of serverRoot
     */
    public static function getServerRoot()
    {
        return self::$serverRoot;
    }

    /**
     * Get the value of host
     */ 
    public static function getHost()
    {
        return self::$host;
    }

    /**
     * Get the value of port
     */ 
    public static function getPort()
    {
        return self::$port;
    }
    /**
     * Get the value of dbname
     */ 
    public static function getDbname()
    {
        return self::$dbname;
    }

    /**
     * Get the value of login
     */ 
    public static function getLogin()
    {
        return self::$login;
    }

    /**
     * Get the value of pwd
     */ 
    public static function getPwd()
    {
        return self::$pwd;
    }


    public static function init()
    {
//on récupere les paramètres de connection base de données

        if (file_exists("parametre.ini")) $fic="parametre.ini"; else $fic="../../parametre.ini";
        //ouverture du fichier en lecture seule
        $fp = fopen($fic, "r");
        //boucle jusqu'à la fin du fichier
        while (!feof($fp)) {
            //lecture d'une ligne, le contenu est stocké dans un tableau
            $ligne = fgets($fp, 4096);
            if ($ligne) //$ligne = false, si la ligne est vide. cela evite de planter s'il y a des passages à la lignes en fin de fichier
            {
                //on garde la partie utile (c'est a dire le parametre)
                $info = explode(":", $ligne);
                // on enleve le caractere espace à la fin
                $param[] = substr($info[1], 0, strlen($info[1]) - 2);
            }
        }

        self::$serverRoot = $param[0];
        self::$adresseRoot = $param[1];
        self::$host = $param[2];
        self::$port = $param[3];
        self::$dbname = $param[4];
        self::$login = $param[5];
        self::$pwd = $param[6];
    }

}

<?php

class Connection
{
    private static $conn;

    public static function connect()
    {


        if (is_null(self::$conn)) {

            define('DB_HOST', "localhost");
            define('DB_USER', "sa");
            define('DB_PASSWORD', "infor2525@");
            define('DB_NAME', "PBS_FB_DADOS");
            define('DB_DRIVER', "sqlsrv");

            $pdoConfig  = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
            $pdoConfig .= "Database=" . DB_NAME . ";";

            try {

            self::$conn =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
            return self::$conn;       
            } catch(PDOException $e){
                $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
                $mensagem .= "\nErro: " . $e->getMessage();
                echo $mensagem;
            }     
        }
    }
}


<?php

class Connection
{
    protected static $conn;

    public static function connect()
    {


        if (is_null(self::$conn)) 
        {

            define("DB_HOST", "localhost");
            define("DB_USER", "infor407_is");
            define("DB_PASS", "infor2525@");
            define("DB_NAME", "infor407_mensageria");

            try 
            {

            self::$conn =  new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
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
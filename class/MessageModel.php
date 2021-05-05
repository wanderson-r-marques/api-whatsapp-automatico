<?php
require 'Connection.php';
class MessageModel
{
    private $con;
    function __construct(){
        $this->con = Connection::connect();
    }

    public function static all(){
        $smtp = $this->con->prepare('SELECT * FROM CUR_MENSAGEM');
        $smtp->execute();
        return $smtp->fetchAll(PDO::FETCH_OBJ);
    }
}




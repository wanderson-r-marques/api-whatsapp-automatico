<?php
require 'Connection.php';
class MessageModel
{  
    // Retorna todas as mensagens
    public static function all() {
        $con = Connection::connect();      
        $smtp = $con->prepare('SELECT * FROM CUR_MENSAGEM');
        $smtp->execute();
        return $smtp->fetchAll(PDO::FETCH_OBJ);
    }

    // Retorna mensagens não enviadas
    public static function allNotSend() {
        $con = Connection::connect();      
        $smtp = $con->prepare("SELECT * FROM CUR_MENSAGEM WHERE ENVIADO = :ENVIADO");
        $enviado = 'N';
        $smtp->bindParam(':ENVIADO',$enviado,PDO::PARAM_STR);
        $smtp->execute();
        return $smtp->fetchAll(PDO::FETCH_OBJ);
    }
   
}






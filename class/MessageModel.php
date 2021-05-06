<?php

class MessageModel extends Connection
{    
    
    // Retorna todas as mensagens
    public static function all() {
        $con = self::$conn;      
        $smtp = $con->prepare('SELECT * FROM CUR_MENSAGEM');
        $smtp->execute();
        return $smtp->fetchAll(PDO::FETCH_OBJ);
    }

    // Retorna mensagens não enviadas
    public static function allNotSend() {
        $con = self::$conn;    
        $query = "SELECT * FROM CUR_MENSAGEM WHERE STATUS IS NULL";        
        $smtp = $con->prepare($query); 
        $smtp->execute();
        return $smtp->fetchAll(PDO::FETCH_OBJ);
    }
   
    // Retorna mensagens não enviadas
    public static function update($atributos,$id) {
        $con = self::$conn;    
        $query = "UPDATE CUR_MENSAGEM SET ".$atributos." WHERE CUR_MENSAGEM = :ID";        
        $smtp = $con->prepare($query); 
        $smtp->bindParam(':ID',$id,PDO::PARAM_INT);
        return $smtp->execute();         
    }
}






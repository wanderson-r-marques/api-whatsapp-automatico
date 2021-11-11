<?php

class MessageModel extends Connection
{    
    
    // Retorna todas as mensagens
    public static function all() {
        $con = self::$conn;      
        $smtp = $con->prepare('SELECT * FROM cur_mensagem');
        $smtp->execute();
        return $smtp->fetchAll(PDO::FETCH_OBJ);
    }

    // Retorna mensagens não enviadas
    public static function allNotSend() {
        $con = self::$conn;    
        $query = "SELECT * FROM cur_mensagem WHERE STATUS IS NULL";        
        $smtp = $con->prepare($query); 
        $smtp->execute();
        return $smtp->fetchAll(PDO::FETCH_OBJ);
    }
   
    // Retorna mensagens não enviadas
    public static function update($atributos,$id) {
        $con = self::$conn;    
        $query = "UPDATE cur_mensagem SET ".$atributos." WHERE cur_mensagem = :ID";        
        $smtp = $con->prepare($query); 
        $smtp->bindParam(':ID',$id,PDO::PARAM_INT);
        return $smtp->execute();         
    }
}






<?php

class TokenModel extends Connection
{     

    // Retorna todas as mensagens
    public static function all() {
        $con = self::$conn;        
        $smtp = $con->prepare('SELECT * FROM CUR_TOKEN');
        $smtp->execute();
        return $smtp->fetchAll(PDO::FETCH_OBJ);
    }

    // Retorna mensagens não enviadas
    public static function findById($id) {
        $con = self::$conn;   
           
        $query = "SELECT * FROM CUR_TOKEN WHERE CUR_TOKEN = :ID";
        $smtp = $con->prepare($query);        
        $smtp->bindParam(':ID',$id,PDO::PARAM_INT);
        $smtp->execute();
        return $smtp->fetch(PDO::FETCH_OBJ); 
    }
   
}






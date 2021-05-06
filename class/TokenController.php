<?php
require 'TokenModel.php';
class TokenController
{
    public static function all()
    {
       return TokenModel::all();        
    }

    public static function findById($id)
    {
       return TokenModel::findById($id);        
    }
}


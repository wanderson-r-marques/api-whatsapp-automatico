<?php
require 'MessageModel.php';
class MessageController
{
    public static function allNotSend()
    {
       return MessageModel::allNotSend();        
    }

    public static function update($atributos,$id)
    {
       return MessageModel::update($atributos,$id);        
    }
}


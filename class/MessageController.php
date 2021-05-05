<?php
require 'MessageModel.php';
class MessageController
{
    public static function allNotSend()
    {
       return MessageModel::allNotSend();        
    }
}

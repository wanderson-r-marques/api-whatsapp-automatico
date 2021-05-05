<?php
require 'Connection.php';
class MessageModel
{
    
}
$con = Connection::connect();
$smtp = $con->prepare('SELECT * FROM CUR_MENSAGEM');
$smtp->execute();
$linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
foreach($linhas as $linha)
{
    echo $linha->TELEFONE;
}

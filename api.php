<?php
require 'class/Connection.php';
require 'class/Message.php';
require 'class/MessageController.php';
require 'class/TokenController.php';

Connection::connect();
$linhas = MessageController::allNotSend();

if (count($linhas)) {
    foreach ($linhas as $linha) {
        $message = new Message();
        $message->setDescricao($linha->DESCRICAO);
        $message->setTelefone($linha->TELEFONE);
        $message->setMensagem($linha->MENSAGEM);
        $message->setDataHoraEnvio(date('Y-m-d H:i:s'));
        $message->setLink($linha->LINK);

        $cliente = TokenController::findById($linha->CUR_TOKEN);
        $token = $cliente->TOKEN;

        $telefone = $message->getTelefone();
        $nome = $message->getDescricao();
        $mensagem = urlencode($message->getMensagem());
        $link = $message->getLink();

        $url = "https://api.isatendimento.com.br/core/v1/api/sendtext/" . $token . "?celular=" . $telefone . "&nome=" . $nome . "&message=" . $mensagem . "&forcar=0&verify=0";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));

        $retorno =  curl_exec($curl);
        $string = json_decode($retorno, true);
        $msg = $string['Message'];
        $status = $string['Status'];
        curl_close($curl);
        MessageController::update("STATUS = $status, RETORNO = '$msg'", $linha->CUR_MENSAGEM);
        echo 'Mensagem: ' . $nome . ' | ' . $telefone . ' | ' . $status . '-' . $msg . '<br>';
        echo 'URL: '.$url.'<hr> ';
        sleep(10);
    }
    
} else {
    echo 'Não há cadastros para enviar a mensagem';
}

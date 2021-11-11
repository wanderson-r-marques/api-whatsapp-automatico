<?php
require 'class/Connection.php';
require 'class/Message.php';
require 'class/MessageController.php';
require 'class/TokenController.php';

Connection::connect();
$linhas = MessageController::allNotSend();

if (count($linhas)) {
    foreach ($linhas as $linha) {
        set_time_limit(300);

        $message = new Message();
        $message->setDescricao($linha->descricao);
        $message->setTelefone($linha->telefone);
        $message->setMensagem($linha->mensagem);
        $message->setDataHoraEnvio(date('Y-d-m H:i:s'));
        $message->setLink($linha->link);

        $cliente = TokenController::findById($linha->cur_token);
        $token = $cliente->token;
        $telefone = $message->getTelefone();
        $dataHora = $message->getDataHoraEnvio();
        $mensagem = urlencode($message->getMensagem());
        $nome = urlencode($message->getDescricao());

        if ($linha->tipo_envio == 1) {
            $url = "https://api.isatendimento.com.br/core/v1/api/sendtext/" . $token . "?celular=" . $telefone . "&nome=" . $nome . "&message=" . $mensagem . "&forcar=0&verify=0";
        } else if ($linha->tipo_envio == 2) {
            $link = $message->getLink();
            $ext = '.' . pathinfo($link, PATHINFO_EXTENSION);
            $url = "https://api.isatendimento.com.br/core/v1/api/sendmedia/" . $token . "?celular=" . $telefone . "&message=" . $mensagem . "&extensao=" . $ext . "&file=" . $link . "&forcar=0&verify=0";
        }
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));

        $retorno =  curl_exec($curl);
        $string = json_decode($retorno, true);
        $msg = $string['Message'];
        $msg = str_replace("'", "''", $msg);
        $status = $string['Status'];
        curl_close($curl);
        MessageController::update("status = $status, retorno = '$msg', data_hora_envio = '$dataHora'", $linha->cur_mensagem);
        sleep(10);
        echo 'Mensagem: ' . $nome . ' | ' . $telefone . ' | ' . $status . '-' . $msg . '<br>';
        echo 'URL: ' . $url . '<hr> ';
    }
} else {
    echo 'Não há cadastros para enviar a mensagem';
}

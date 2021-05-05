<?php
require 'class/MessageController.php';

$linhas = MessageController::allNotSend();
foreach ($linhas as $linha) {
    // $telefone = $linha->TELEFONE;
    $telefone = '55819824493';
    $nome = $linha->DESCRICAO;
    $mensagem = urlencode($linha->MENSAGEM);
    $link = $linha->LINK;
    $token = '602a7ef734b005e100cc1af3';
    $url = "https://api.isatendimento.com.br/core/v1/api/sendtext/" . $token . "?celular=" . $telefone . "&nome=" . $nome . "&message=" . $mensagem . "&forcar=0&verify=0";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_exec($curl);
    $retorno =  curl_close($curl);
    echo 'Mensagem enviada para: ' . $nome . ' | ' . $telefone.' | '.$retorno.'<br>';
    
}
echo '<hr> URL: '.$url;

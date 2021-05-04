<?php

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://api.isatendimento.com.br/core/v1/api/sendtext/602a7ef734b005e100cc1af3?celular=5581998244913&nome=whanderson&message=teste%20de%20mensagem&forcar=0&verify=0");
curl_setopt($curl, CURLOPT_POST, true);
curl_exec($curl);
curl_close($curl);



<?php

$cep = $_GET['cep'];

require_once '../model/endereco.php';

// inicia cURL
$curl = curl_init();

// config cURL
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://viacep.com.br/ws/" . $cep . "/json/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "GET"
));

// executa cURL
$response  = curl_exec($curl);

// fecha cURL
curl_close($curl);

// converte JSON em array
$array = json_decode($response, true);

// preenche na classe Endereço;

$end = new Endereco($array["logradouro"], $array["bairro"], $array["localidade"], $array["uf"]);


// retorno
header('Content-Type: application/json; charset=utf-8');
echo json_encode($end);
// return $end;


// complemento a ser escrito ainda...

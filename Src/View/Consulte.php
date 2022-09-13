<?php

use Src\Api\Speedio;

$obSpeedio = new Speedio;

$cnpj = '17830029000101';

$result = $obSpeedio->consulterCNPJ($cnpj);

if (empty($result)) {
    die('Problemas ao consultar CNPJ');
}

if (isset($result['error'])) {
    die($result['error']);
}
//$result2 = array(
//    "Nome Fantasia" => $result['NOME FANTASIA'],
//    "Razao Social" => $result['RAZAO SOCIAL']
//);
echo json_encode($result);
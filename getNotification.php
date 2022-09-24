<?php

require __DIR__ . '/vendor/autoload.php'; // caminho relacionado a SDK

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
use PhpParser\Node\Stmt\Foreach_;

$clientId = 'Client_Id_b95abb391df95adf0c0f0acda1721e87682e099d'; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = 'Client_Secret_bfaafcb99212b11528e167bd834c26212db8b9e1'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = Homologação e false = producao)
];

/*
* Este token será recebido em sua variável que representa os parâmetros do POST
* Ex.: $_POST['notification']
*/
$token = $_POST["notification"] = "2b624585-3940-4486-8a51-4884368d0b2d";

$params = [
  'token' => $token
];

try {
  $api = new Gerencianet($options);
  $chargeNotification = $api->getNotification($params, []);
  // Para identificar o status atual da sua transação você deverá contar o número de situações contidas no array,
  // pois a última posição guarda sempre o último status. Veja na um modelo de respostas na seção "Exemplos de respostas" abaixo.

  // Veja abaixo como acessar o ID e a String referente ao último status da transação.

  // Conta o tamanho do array data (que armazena o resultado)
  $i = count($chargeNotification["data"]);
  // Pega o último Object chargeStatus
  $ultimoStatus = $chargeNotification["data"][$i - 1];
  // Acessando o array Status
  $status = $ultimoStatus["status"];
  // Obtendo o ID da transação        
  $charge_id = $ultimoStatus["identifiers"]["charge_id"];
  // Obtendo a String do status atual
  $statusAtual = $status["current"];


  $charge_status = array_filter($chargeNotification["data"], function ($charge) {
    return $charge["status"]["current"] === "settled";
  });
  // Com estas informações, você poderá consultar sua base de dados e atualizar o status da transação especifica, uma vez que você possui o "charge_id" e a String do STATUS

  echo json_encode($charge_status, JSON_PRETTY_PRINT);

  //echo "O id da transação é: " . $charge_id . " seu novo status é: " . $statusAtual;
  echo "\n\n";
  //print_r($chargeNotification);
  //var_dump($chargeNotification);
  // echo json_encode($chargeNotification, JSON_PRETTY_PRINT);
  // echo $chargeNotification;
  // print_r($chargeNotification, true);
} catch (GerencianetException $e) {
  print_r($e->code);
  print_r($e->error);
  print_r($e->errorDescription);
} catch (Exception $e) {
  print_r($e->getMessage());
}

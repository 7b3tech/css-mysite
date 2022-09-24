<?php
require __DIR__ . '/vendor/autoload.php'; // caminho relacionado a SDK

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

$clientId = 'Client_Id_b95abb391df95adf0c0f0acda1721e87682e099d'; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = 'Client_Secret_bfaafcb99212b11528e167bd834c26212db8b9e1'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = Homologação e false = producao)
];

// $charge_id refere-se ao ID da transação (charge_id) desejado
$charge_id = "1691315";

// $params = [
//     'id' => 0,
//     'parcel' => 1
// ];
$params = [
  'id' => $charge_id,
  'parcel' => 1
];

try {
  $api = new Gerencianet($options);
  $charge = $api->settleCharge($params, []);

  // print_r($charge);

  echo json_encode($charge, JSON_PRETTY_PRINT);
} catch (GerencianetException $e) {
  print_r($e->code);
  print_r($e->error);
  print_r($e->errorDescription);
} catch (Exception $e) {
  print_r($e->getMessage());
}

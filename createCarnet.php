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

$item_1 = [
  'name' => 'Item 1', // nome do item, produto ou serviço
  'amount' => 1, // quantidade
  'value' => 1000 // valor (1000 = R$ 10,00) (Obs: É possível a criação de itens com valores negativos. Porém, o valor total da fatura deve ser superior ao valor mínimo para geração de transações.)
];

$item_2 = [
  'name' => 'Item 2', // nome do item, produto ou serviço
  'amount' => 2, // quantidade
  'value' => 2000 // valor (2000 = R$ 20,00)
];

$item_3 = [
  'name' => 'Item 3', // nome do item, produto ou serviço
  'amount' => 3, // quantidade
  'value' => 2000 // valor (2000 = R$ 20,00)
];

$item_4 = [
  'name' => 'Item 4', // nome do item, produto ou serviço
  'amount' => 4, // quantidade
  'value' => 1000 // valor (1000 = R$ 10,00) (Obs: É possível a criação de itens com valores negativos. Porém, o valor total da fatura deve ser superior ao valor mínimo para geração de transações.)
];

$item_5 = [
  'name' => 'Item 5', // nome do item, produto ou serviço
  'amount' => 5, // quantidade
  'value' => 2000 // valor (2000 = R$ 20,00)
];

$item_6 = [
  'name' => 'Item 6', // nome do item, produto ou serviço
  'amount' => 6, // quantidade
  'value' => 2000 // valor (2000 = R$ 20,00)
];

$items =  [
  $item_1,
  // $item_2,
  // $item_3,
  // $item_4,
  // $item_5,
  // $item_6
];

$customer = [
  //'custom_id' => '171',
  'name' => 'Neto de Caju Oldbuck', // nome do cliente
  'cpf' => '94271564656', // cpf do cliente
  'phone_number' => '5144916523' // telefone do cliente
];

// Exemplo para receber notificações da alteração do status do carne.
// $metadata = ['notification_url'=>'sua_url_de_notificacao_.com.br']
// Outros detalhes em: https://dev.gerencianet.com.br/docs/notificacoes

// Como enviar seu $body com o $metadata
// $body = [
// 'items' => $items,
// 'customer' => $customer,
// 'expire_at' => '2020-12-02',
// 'repeats' => 5,
// 'split_items' => false,
// 'metadata' => $metadata
// ];


$metadata = array(
  'notification_url' => 'http://api.webhookinbox.com/i/i48yaac6/in/',
  'custom_id' => "200",
); //Url de notificações

$body = [
  'metadata' => $metadata,
  'items' => $items,
  'customer' => $customer,
  'expire_at' => '2022-09-24', // data de vencimento da primeira parcela do carnê
  'repeats' => 12, // número de parcelas do carnê
  'split_items' => false
];

try {
  $api = new Gerencianet($options);
  $carnet = $api->createCarnet([], $body);

  //print_r($carnet);

  echo json_encode($carnet, JSON_PRETTY_PRINT);
} catch (GerencianetException $e) {
  print_r($e->code);
  print_r($e->error);
  print_r($e->errorDescription);
} catch (Exception $e) {
  print_r($e->getMessage());
}

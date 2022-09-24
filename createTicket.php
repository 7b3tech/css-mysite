<?php
require __DIR__ . '/vendor/autoload.php'; // caminho relacionado a SDK

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

$clientId = 'Client_Id_b95abb391df95adf0c0f0acda1721e87682e099d'; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = 'Client_Secret_bfaafcb99212b11528e167bd834c26212db8b9e1'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = homologação e false = producao)
];

$item_1 = [
  'name' => 'Item 1', // nome do item, produto ou serviço
  'amount' => 1, // quantidade
  'value' => 1000 // valor (1000 = R$ 10,00) (Obs: É possível a criação de itens com valores negativos. Porém, o valor total da fatura deve ser superior ao valor mínimo para geração de transações.)
];
$items = [
  $item_1
];
$metadata = array('notification_url' => 'http://api.webhookinbox.com/i/i48yaac6/in/'); //Url de notificações
$customer = [
  'name' => 'Joe Doe', // nome do cliente
  'cpf' => '94271564656', // cpf válido do cliente
  'phone_number' => '5144916523', // telefone do cliente
];
$discount = [ // configuração de descontos
  'type' => 'currency', // tipo de desconto a ser aplicado
  'value' => 599 // valor de desconto 
];
$configurations = [ // configurações de juros e mora
  'fine' => 200, // porcentagem de multa
  'interest' => 33 // porcentagem de juros
];
$conditional_discount = [ // configurações de desconto condicional
  'type' => 'percentage', // seleção do tipo de desconto 
  'value' => 500, // porcentagem de desconto
  'until_date' => '2022-09-24' // data máxima para aplicação do desconto
];
$bankingBillet = [
  'expire_at' => '2022-09-24', // data de vencimento do titulo
  'message' => 'teste\nteste\nteste\nteste', // mensagem a ser exibida no boleto
  'customer' => $customer,
  'discount' => $discount,
  'conditional_discount' => $conditional_discount
];
$payment = [
  'banking_billet' => $bankingBillet // forma de pagamento (banking_billet = boleto)
];
$body = [
  'items' => $items,
  'metadata' => $metadata,
  'payment' => $payment
];
try {
  $api = new Gerencianet($options);
  $pay_charge = $api->oneStep([], $body);
  echo '<pre>';
  print_r($pay_charge);
  echo '<pre>';
} catch (GerencianetException $e) {
  print_r($e->code);
  print_r($e->error);
  print_r($e->errorDescription);
} catch (Exception $e) {
  print_r($e->getMessage());
}

<?php

function setURLNotification($clientId, $clientSecret){

$options = [
    'client_id' => $clientId,
    'client_secret' => $clientSecret,
    'sandbox' => true
];
$item_1 = [
   {
      "name": "Meu Produto",
      "value": 8900,
      "amount": 1
   }
];
$items = [
       $item_1
   ];
$metadata = array('notification_url'=>'http://sua_url_aqui');

$body = [
    'items' => $items,
    'metadata' => $metadata
];
try {
    $api = new Gerencianet($options);
    $charge = $api->createCharge([], $body);
}
}

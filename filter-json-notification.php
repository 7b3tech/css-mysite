<?php
$ParsedArray = [
  "code" => 200,
  "data" => [
    [
      "id" => 1,
      "type" => "carnet",
      "custom_id" => "171",
      "status" => [
        "current" => "up_to_date",
        "previous" => null
      ],
      "identifiers" => [
        "carnet_id" => 73232
      ],
      "created_at" => "2022-09-21 09:04:37"
    ],
    [
      "id" => 2,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "new",
        "previous" => null
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691315
      ],
      "created_at" => "2022-09-21 09:04:37"
    ],
    [
      "id" => 3,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "waiting",
        "previous" => "new"
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691315
      ],
      "created_at" => "2022-09-21 09:04:37"
    ],
    [
      "id" => 4,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "new",
        "previous" => null
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691316
      ],
      "created_at" => "2022-09-21 09:04:37"
    ],
    [
      "id" => 5,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "new",
        "previous" => null
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691317
      ],
      "created_at" => "2022-09-21 09:04:37"
    ],
    [
      "id" => 6,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "new",
        "previous" => null
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691318
      ],
      "created_at" => "2022-09-21 09:04:37"
    ],
    [
      "id" => 7,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "new",
        "previous" => null
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691319
      ],
      "created_at" => "2022-09-21 09:04:37"
    ],
    [
      "id" => 8,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "waiting",
        "previous" => "new"
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691316
      ],
      "created_at" => "2022-09-21 09:04:37"
    ],
    [
      "id" => 9,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "waiting",
        "previous" => "new"
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691317
      ],
      "created_at" => "2022-09-21 09:04:37"
    ],
    [
      "id" => 10,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "waiting",
        "previous" => "new"
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691318
      ],
      "created_at" => "2022-09-21 09:04:37"
    ],
    [
      "id" => 11,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "waiting",
        "previous" => "new"
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691319
      ],
      "created_at" => "2022-09-21 09:04:37"
    ],
    [
      "id" => 12,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "settled",
        "previous" => "waiting"
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691315
      ],
      "created_at" => "2022-09-21 11:43:02"
    ],
    [
      "id" => 13,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "settled",
        "previous" => "waiting"
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691316
      ],
      "created_at" => "2022-09-21 11:44:05"
    ],
    [
      "id" => 14,
      "type" => "carnet_charge",
      "custom_id" => "171",
      "status" => [
        "current" => "canceled",
        "previous" => "waiting"
      ],
      "identifiers" => [
        "carnet_id" => 73232,
        "charge_id" => 1691319
      ],
      "created_at" => "2022-09-21 11:59:42"
    ]
  ]
];

$charge_status = array_filter($ParsedArray["data"], function ($charge) {
  return $charge["status"]["current"] === "settled";
});

var_dump($charge_status);

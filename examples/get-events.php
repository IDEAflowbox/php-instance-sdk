#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

dump(
    $shop->getEvents([
        'page' => 1,
        'date_from' => '2021-08-28',
        'date_to' => '2021-08-30',
        'user_id' => '965e4bf3-4674-43c8-9b69-9f6be0c7ac89',
    ])
);
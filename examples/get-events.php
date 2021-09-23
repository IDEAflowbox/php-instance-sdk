#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();


dump(
    $shop->event->get([
        'page' => 1,
        'date_from' => '2020-08-28',
        'date_to' => '2022-08-30',
    ])
);
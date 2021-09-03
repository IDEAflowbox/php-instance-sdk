#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

dump(
    $shop->product->get([
        'page' => 1
    ])
);

// it just an wrapper for the method `getProducts`
dump(
    $shop->feed->get([
        'page' => 1
    ])
);
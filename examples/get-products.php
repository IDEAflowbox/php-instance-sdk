#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

dump(
    $shop->getProducts([
        'page' => 1
    ])
);

// it just an wrapper for the method `getProducts`
dump(
    $shop->getFeed([
        'page' => 1
    ])
);
#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

dump(
    $shop->getFeed([
        'page' => 1
    ])
);

// it just an wrapper for the method `getFeed`
dump(
    $shop->getProducts([
        'page' => 1
    ])
);
#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

dump(
    $shop->category->associate("11", "30fbf311-c3b9-4ab7-87d3-f7c2cc3fdeb2")
);
dump(
    $shop->category->associateMany([
        "12" => null,
        "13" => "30fbf311-c3b9-4ab7-87d3-f7c2cc3fdeb2",
    ])
);
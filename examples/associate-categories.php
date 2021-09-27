#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

dump(
    $shop->category->associate("614c52f75edff", "30fbf311-c3b9-4ab7-87d3-f7c2cc3fdeb2")
);
dump(
    $shop->category->associateMany([
        "aa" => null,
        "614c5310ca4e4" => "30fbf311-c3b9-4ab7-87d3-f7c2cc3fdeb2",
    ])
);
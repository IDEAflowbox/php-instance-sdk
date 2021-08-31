#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

dump(
    $shop->updateUser(\Cyberkonsultant\Model\User::update(
        '58d50fcf-4e90-4f33-941d-d3e73dc092db',
        'tttt',
        'piotr',
        'miłoszewicz',
        'male'
    ))
);
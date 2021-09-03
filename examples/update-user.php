#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();
$user = $shop->user->find("58d50fcf-4e90-4f33-941d-d3e73dc092db");
$user->setFirstName("Piotr");

dump(
    $shop->user->update($user)
);
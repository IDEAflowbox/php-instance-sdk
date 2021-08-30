#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

dump(
    $shop->updateUser(\Cyberkonsultant\Model\User::update(
        'id',
        'siwymilek',
        'piotr',
        'miłoszewicz',
        'male'
    ))
);
#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

dump(
    $shop->createEvent(\Cyberkonsultant\Model\Event::create(
        'view',
        '214ef8d5-8494-4c94-a152-51e8d75f0f1a',
        '58d50fcf-4e90-4f33-941d-d3e73dc092db',
        5.60
    ))
);
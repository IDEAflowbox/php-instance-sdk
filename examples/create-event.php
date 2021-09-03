#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\EventBuilder;

$shop = $sdk->getShopScope();

$eventBuilder = new EventBuilder();
$event = $eventBuilder
    ->setUserId('214ef8d5-8494-4c94-a152-51e8d75f0f1a')
    ->setProductId('58d50fcf-4e90-4f33-941d-d3e73dc092db')
    ->setPrice(15.34)
    ->setType('view')
    ->getResult()
;

dump($shop->event->create($event));
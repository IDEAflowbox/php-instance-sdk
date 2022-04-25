#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\EventBuilder;

$shop = $sdk->getShopScope();

$eventBuilder = new EventBuilder();


try {
    $event = $eventBuilder
        ->setUserId('58d50fcf-4e90-4f33-941d-d3e73dc092db')
        ->setProductId('214ef8d5-8494-4c94-a152-51e8d75f0f1a')
        ->setPrice(15.34)
        ->setType('view')
        ->setCategoryId('be3181d9-3d31-4ed3-834f-f27f6aeaaecf')
        //->setCartId('64a3d188-d5cc-485a-98ad-5b7d58be55e0')
        ->getResult()
    ;
    dump($shop->event->createBatch([$event]));
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}

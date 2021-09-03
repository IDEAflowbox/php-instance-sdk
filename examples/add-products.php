#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\ProductBuilder;

$shop = $sdk->getShopScope();

try {
    $productBuilder = new ProductBuilder();
    $product = $productBuilder
        ->setName('Testowy produkt')
        ->setCode(uniqid())
        ->setUrl('https://dostolarni.pl/pl/products/frez-oscylacyjny-z-lamaczem-wiora-102/102.060.31')
        ->setNetPrice(100)
        ->setGrossPrice(123)
        ->addCategory("66")
        ->addCategory("67")
        ->getResult()
    ;

    dump(
        $shop->product->createMany([$product])
    );
} catch (\GuzzleHttp\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
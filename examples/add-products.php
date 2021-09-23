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
        ->addCategory("f379ea39-b9b4-4810-ab07-98f4d1aa2044")
        ->addCategory("f379ea39-b9b4-4810-ab07-98f4d1aa2043")
        ->getResult()
    ;

    dump(
        $shop->product->createMany([$product])
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
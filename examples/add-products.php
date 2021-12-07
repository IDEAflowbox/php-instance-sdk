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
        ->setId(uniqid())
        ->setUrl('https://dostolarni.pl/pl/products/frez-oscylacyjny-z-lamaczem-wiora-102/102.060.31')
        ->setNetPrice(100)
        ->setGrossPrice(123)
        ->setGrossSalePrice(50)
        ->setStock(987654)
        ->setSku("123/XX/EE")
        ->setCurrency("PLN")
        ->addCategory("12")
        ->addFeature("php", "sdk")
        ->addFeature("php2", "sdk2")
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
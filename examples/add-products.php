#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

try {
    $shop->addProducts([
        \Cyberkonsultant\Model\Product::create(
            'test.test.test',
            'Name: test',
            'https://dostolarni.pl/pl/products/frez-oscylacyjny-z-lamaczem-wiora-102/102.060.31',
            100,
            123,
            [
                \Cyberkonsultant\Model\Category::attach("66"),
                \Cyberkonsultant\Model\Category::attach("67")
            ],
            'description test'
        ),
    ]);
} catch (\GuzzleHttp\Exception\ClientException $e) {
    dump($sdk->map($e->getResponse()->getBody()->getContents(), \Cyberkonsultant\Model\ErrorResponse::class));
}
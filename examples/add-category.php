#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\CategoryBuilder;

$shop = $sdk->getShopScope();

try {
    $categoryBuilder = new CategoryBuilder();
    $category = $categoryBuilder
        ->setId(uniqid())
        ->setName('Test category')
        ->getResult();

    dump(
        $shop->category->create($category)
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
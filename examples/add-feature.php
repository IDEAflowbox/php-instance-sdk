#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\Feature\ChoiceBuilder;
use Cyberkonsultant\Builder\FeatureBuilder;

$shop = $sdk->getShopScope();

try {
    $featureBuilder = new FeatureBuilder();
    $feature = $featureBuilder
        ->setId(uniqid())
        ->setName('Test feature')
        ->addChoice((new ChoiceBuilder)->setId(uniqid())->setName('Test choice')->getResult())
        ->addChoice((new ChoiceBuilder)->setId(uniqid())->setName('Test choice')->getResult())
        ->addChoice((new ChoiceBuilder)->setId(uniqid())->setName('Test choice')->getResult())
        ->addChoice((new ChoiceBuilder)->setId(uniqid())->setName('Test choice')->getResult())
        ->addChoice((new ChoiceBuilder)->setId(uniqid())->setName('Test choice')->getResult())
        ->addChoice((new ChoiceBuilder)->setId(uniqid())->setName('Test choice')->getResult())
        ->getResult();

    dump(
        $shop->feature->create($feature)
    );
} catch (\GuzzleHttp\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
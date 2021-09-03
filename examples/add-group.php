#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Assembler\SuccessResponseAssembler;
use Cyberkonsultant\Builder\GroupBuilder;
use Cyberkonsultant\Builder\Group\FilterBuilder;

$shop = $sdk->getShopScope();

try {
    $groupBuilder = new GroupBuilder();
    $group = $groupBuilder
        ->setName('Test group')
        ->getCriteriaBuilder()
            ->addFilter(
                    (new FilterBuilder())
                        ->setField('net_price')
                        ->setOperator('>=')
                        ->setValue('20')
                        ->getResult()
                    )
            ->addFilter(
                    (new FilterBuilder())
                        ->setField('net_price')
                        ->setOperator('<=')
                        ->setValue('100')
                        ->getResult()
                    )
        ->endCriteriaBuilder()
        ->getResult();

    dump(
        $shop->group->create($group)
    );
} catch (\GuzzleHttp\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
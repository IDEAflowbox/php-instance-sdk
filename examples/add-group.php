#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

try {
    dump(
        $shop->addGroup(\Cyberkonsultant\Model\Group::create(
            'test-group',
            \Cyberkonsultant\Model\Criteria::create([
                \Cyberkonsultant\Model\Filter::create(
                    'net_price',
                    '>=',
                    "6.50"
                ),
                \Cyberkonsultant\Model\Filter::create(
                    'net_price',
                    '<=',
                    "13.0"
                )
            ])
        ))
    );
} catch (\GuzzleHttp\Exception\ClientException $e) {
    dump($sdk->map($e->getResponse()->getBody()->getContents(), \Cyberkonsultant\Model\ErrorResponse::class));
}
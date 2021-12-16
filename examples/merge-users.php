#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

try {
    $shop->user->merge(['ef70a808-9ad0-4fe6-aa82-b0bbeb23ea5d', 'fe56784b-db76-43b1-8844-f416214c4eee'], 'fe56784b-db76-43b1-8844-f416214c4eee')
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dd(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\UserBuilder;

$shop = $sdk->getShopScope();
$user = (new UserBuilder())
    ->setId("7483da54-9d20-40bc-84dd-0fb967135145")
    ->setEmail("dffgf@o2.pl")
    ->getResult();

$user->setFirstName("Piotr");
$user->setCity("Szczecinek");

try {
    dump(
        $shop->user->create($user)
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dd(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
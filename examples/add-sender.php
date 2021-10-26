#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\SenderBuilder;

$crm = $sdk->getCrmScope();

try {
    $senderBuilder = new SenderBuilder();
    $sender = $senderBuilder
        ->setName('Peter e-mail')
        ->setEmail('peter@localhost')
        ->setHost('localhost')
        ->setUsername('')
        ->setPassword('')
        ->setPort(25)
        ->getResult()
    ;

    dump(
        $crm->sender->create($sender)
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
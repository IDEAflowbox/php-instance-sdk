#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\SenderBuilder;

$crm = $sdk->getCrmScope();

try {
    dump(
        $crm->sender->activateSender("2a9793f0-fe8d-4162-804c-fd4568abfcf8", 671525)
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
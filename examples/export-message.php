#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\SenderBuilder;

$crm = $sdk->getCrmScope();

try {
    dump(
        $crm->message->export("b248d43b-85b4-4516-b766-68e7668ebf11")
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
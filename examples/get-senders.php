#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$crm = $sdk->getCrmScope();

try {
    dump(
        $crm->sender->get(['page' => 1])
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
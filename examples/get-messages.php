#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$crm = $sdk->getCrmScope();

try {
    dump(
        $crm->message->get(['page' => 1])
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump($sdk->map($e->getResponse()->getBody()->getContents(), \Cyberkonsultant\Model\ErrorResponse::class));
}
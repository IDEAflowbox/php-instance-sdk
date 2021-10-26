#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$crm = $sdk->getCrmScope();

try {
    dump(
        $crm->message->find("b248d43b-85b4-4516-b766-68e7668ebf11")
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump($sdk->map($e->getResponse()->getBody()->getContents(), \Cyberkonsultant\Model\ErrorResponse::class));
}
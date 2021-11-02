#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$crm = $sdk->getCrmScope();

try {
    dump(
        $crm->message->cancel("5903bb00-bac3-49c6-931d-9143e8e0097c")
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump($sdk->map($e->getResponse()->getBody()->getContents(), \Cyberkonsultant\Model\ErrorResponse::class));
}
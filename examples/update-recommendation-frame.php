#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

$shop = $sdk->getShopScope();

try {
    $frame = $shop->recommendationFrame->find("4454da7c-ab49-44ce-81e9-70d52e50c8d4");
    $frame->setName("Another name");

    dump(
        $shop->recommendationFrame->update($frame)
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump($sdk->map($e->getResponse()->getBody()->getContents(), \Cyberkonsultant\Model\ErrorResponse::class));
}
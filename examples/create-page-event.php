#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\PageEventBuilder;

$crm = $sdk->getCrmScope();
$pageEventBuilder = new PageEventBuilder();

try {
    $pageEvent = $pageEventBuilder
        ->setUserId('58d50fcf-4e90-4f33-941d-d3e73dc092db')
        ->setProductId('214ef8d5-8494-4c94-a152-51e8d75f0f1a')
        ->setType('frame_view')
        ->setUrl('http://google.com/')
        ->setFrameId('c24204a3-f115-4e26-8e22-5ae734fe9ea1')
        ->getResult()
    ;
    dump($crm->pageEvent->create($pageEvent));
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}

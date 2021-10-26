#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\MessageBuilder;

$crm = $sdk->getCrmScope();

try {
    $messageBuilder = new MessageBuilder();
    $message = $messageBuilder
        ->setName('Testowa wiadomość')
        ->setStartDate((new \DateTime())->modify('+3 days'))
        ->setSegmentId('39e6da38-6f1a-4b68-afe9-ead4a1edcc35')
        ->setSenderId('4615bb54-0478-4988-83c7-042b21da65ee')
        ->setContents('Siemanko')
        ->setUtmCampaign('cyberk')
        ->getResult()
    ;

    dump(
        $crm->message->create($message)
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
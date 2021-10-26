#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Assembler\SuccessResponseAssembler;
use Cyberkonsultant\Builder\SegmentBuilder;
use Cyberkonsultant\Builder\Segment\ParameterBuilder;

$crm = $sdk->getCrmScope();

try {
    $segmentBuilder = new SegmentBuilder();
    $segment = $segmentBuilder
        ->setName('Czerwony segment')
        ->setColor('#ff0000')
        ->addParameter(
            (new ParameterBuilder())
                ->setType('CITY')
                ->setOperator('=')
                ->setValue('Warszawa')
                ->getResult()
        )
        ->getResult()
    ;


    dump(
        $crm->segment->create($segment)
    );
} catch (\Cyberkonsultant\Exception\ClientException $e) {
    dump(
        $sdk->getEdgeResponse($e->getResponse(), \Cyberkonsultant\Assembler\ErrorResponseAssembler::class)
    );
}
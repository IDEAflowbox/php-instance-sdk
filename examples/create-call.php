#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\CallBuilder;

$voice = $sdk->getVoiceScope();

$callBuilder = new CallBuilder();
$call = $callBuilder
    ->setOrderNumber('123456789')
    ->setCallerNumber('725309338')
    ->getResult()
;

dump($voice->call->create($call));
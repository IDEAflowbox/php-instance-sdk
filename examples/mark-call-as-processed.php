#!/bin/bash
<?php
include __DIR__.'/config.php';
global $sdk;

use Cyberkonsultant\Builder\CallBuilder;

$voice = $sdk->getVoiceScope();

dump($voice->call->markAsProcessed('ca2b301e-8967-4000-9dca-7650a4a8ba66'));